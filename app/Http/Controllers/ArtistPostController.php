<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostComment;
use App\Models\PostLike;
use App\Models\PostMedia;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ArtistPostController extends Controller
{
    //POST COMMENT
    public function getPostComments($postId)
    {
        // Fetch comments associated with the specified post ID
        $comments = DB::table('post_comment as PC')
                    ->select([
                        'PC.CONTENT',
                        'MU.USERNAME',
                        'MU.PROFILE_IMAGE_PATH',
                        DB::raw("
                            CASE
                                WHEN DATEDIFF(DAY, PC.CREATED_AT, GETDATE()) <= 0 THEN 'Today'
                                WHEN DATEDIFF(YEAR, PC.CREATED_AT, GETDATE()) >= 1 THEN CAST(DATEDIFF(YEAR, PC.CREATED_AT, GETDATE()) AS VARCHAR) + ' Years Ago'
                                WHEN DATEDIFF(MONTH, PC.CREATED_AT, GETDATE()) >= 1 THEN CAST(DATEDIFF(MONTH, PC.CREATED_AT, GETDATE()) AS VARCHAR) + ' Months Ago'
                                ELSE CAST(DATEDIFF(DAY, PC.CREATED_AT, GETDATE()) AS VARCHAR) + ' Days Ago'
                            END AS COMMENT_TIME
                        ")
                    ])
                    ->join('master_user as MU', 'MU.USER_ID', '=', 'PC.USER_ID')
                    ->where('PC.POST_ID', $postId)
                    ->get();

        // Return comments as a JSON response
        return response()->json($comments);
    }

    public function addPostComment(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $postComment = new PostComment();
        $postComment->POST_ID = $postId;
        $postComment->USER_ID = Auth::id(); // Assuming the user is authenticated
        $postComment->CONTENT = $request->content;
        $postComment->created_at = now()->setTimezone('Asia/Jakarta');;
        $postComment->save();

        // Return a consistent structure for the comment
        return response()->json([
            'USERNAME' => Auth::user()->USERNAME, // Assuming USERNAME is the field for the user's name
            'COMMENT_TIME' => $postComment->created_at->diffForHumans(),
            'CONTENT' => $postComment->CONTENT,
            'PROFILE_IMAGE_PATH' => Auth::user()->PROFILE_IMAGE_PATH
        ]);
    }

    public function addPost(Request $request)
    {
        try {
            $validated = Validator::make($request->all(),[
                'postContent'=>'required|string',
                'imageOption' => 'required|string|in:file,link',
                'postImageUpload' => 'nullable|required_if:imageOption,file|image|mimes:jpeg,png,jpg,gif|max:2048',
                'postImageLink' => 'nullable|required_if:imageOption,link|url'
            ],[
                'postContent.required' => '* Please fill the post content',
                'postImageUpload.required_if' => '* Please upload an image file when "Upload from File" is selected.',
                'postImageLink.required_if' => '* Please provide a valid URL when "Upload by Link" is selected.',
            ]);

            if ($validated->fails()) {
                // Return validation errors as JSON
                return response()->json(['errors' => $validated->errors()], 422);
            }

            if ($request->imageOption === 'file') {
                $imagePath = $request->file('postImageUpload')->store('uploads', ['disk' => 'public']);
                $imagePath = '/storage/' . $imagePath;
            } elseif ($request->imageOption === 'link') {
                $imagePath = $request->postImageLink;
            }

             // Fetch artist ID
             $artist = DB::table('ARTIST')
             ->select('ARTIST_ID')
             ->where('USER_ID', Auth::id())
             ->first();

            if (!$artist) {
                return response()->json(['errors' => ['error' => 'Artist not found.']], 422);
            }

            $artistId = $artist->ARTIST_ID;

            $post = Post::create([
                'ARTIST_ID' =>  $artistId,
                'CONTENT' => $request->postContent,
            ]);

            PostMedia::create([
                'POST_ID' => $post->POST_ID,
                'POST_MEDIA_PATH' =>$imagePath,
            ]);


            return response()->json(['success' => 'Portfolio added successfully!'], 200);
        }
        catch(\Exception $e) {
            return response()->json(['errors' => ['error' => 'An unexpected error occurred.']], 500);
        }
    }
 
    public function deletePost($postId)
    {
        try {
            // Fetch the associated media for the post
            $postMedia = PostMedia::where('POST_ID', $postId)->get();
            $postComment = PostComment::where('POST_ID', $postId)->get();
            $postLike = PostLike::where('POST_ID', $postId)->get();
            
            // Delete all associated post media
            foreach ($postMedia as $media) {
                $media->delete();
            }

            // Delete all associated post media
            foreach ($postComment as $comment) {
                $comment->delete();
            }

            // Delete all associated post media
            foreach ($postLike as $like) {
                $like->delete();
            }
    
            // Now delete the post itself
            $post = Post::findOrFail($postId);
            $post->delete();
    
            return response()->json(['success' => 'Post deleted successfully.']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Post not found.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }

    public function togglePostLike($postId, Request $request)
    {
        $userId = auth()->id(); // Get the current user ID

        try {
            // Check if the user has already liked the post
            $postLike = PostLike::where('USER_ID', $userId)->where('POST_ID', $postId)->first();

            $isLiked = false; // Default state
            if ($postLike) {
                $postLike->delete(); // Unlike the post
            } else {
                PostLike::create([
                    'USER_ID' => $userId,
                    'POST_ID' => $postId
                ]);
                $isLiked = true; // Like the post
            }

            // Get the updated total likes for the post
            $totalLikes = PostLike::where('POST_ID', $postId)->count();

            return response()->json([
                'success' => true, // Indicates the operation was successful
                'isLiked' => $isLiked, // Current like state
                'total_likes' => $totalLikes, // Updated like count
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while toggling the like.',
            ]);
        }
    }
}
