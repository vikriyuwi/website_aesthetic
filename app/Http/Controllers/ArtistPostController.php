<?php

namespace App\Http\Controllers;
use App\Models\PostComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
