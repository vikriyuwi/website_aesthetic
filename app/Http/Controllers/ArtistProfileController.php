<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\MasterUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ArtistProfileController extends Controller
{
    public function showArtist($ARTIST_ID, $section = 'home')
    {
        $artistCheck = DB::table('ARTIST')
                ->select('*')
                ->where('ARTIST_ID','=',$ARTIST_ID)
                ->get();

        if (!(count($artistCheck))) {
            abort(404, 'Artist not found.');
        }
        else{
            $artist = DB::table('ARTIST')
                    ->select('MASTER_USER.USERNAME', 'MASTER_USER.PROFILE_IMAGE_PATH', 'ARTIST.*')
                    ->join('MASTER_USER','MASTER_USER.USER_ID','=','ARTIST.USER_ID')
                    ->where('ARTIST_ID','=',$ARTIST_ID)
                    ->get();

            $artistUser = DB::table('ARTIST')
                            ->select('USER_ID')
                            ->where('ARTIST_ID','=',$ARTIST_ID)
                            ->first();
            $artistUserId = $artistUser ? (int) $artistUser->USER_ID : null;

            $countArtistView = DB::table('ART')
                            ->select(DB::raw("FORMAT(SUM([VIEW]), 'N0') as TOTAL_VIEWS"))
                            ->where('ARTIST_ID', '=', $ARTIST_ID)
                            ->first();
    
            $countArtistLikes = DB::table('ART_LIKE')
                            ->select(DB::raw("FORMAT(COUNT(*), 'N0') as TOTAL_LIKES"))
                            ->join('ART', 'ART.ART_ID', '=', 'ART_LIKE.ART_ID')
                            ->where('ART.ARTIST_ID', '=', $ARTIST_ID)
                            ->groupBy('ART.ARTIST_ID')
                            ->first();

            $countArtistFollowers = DB::table('FOLLOWER')
                                ->select(DB::raw("FORMAT(COUNT(*), 'N0') as TOTAL_FOLLOWERS"))
                                ->where('FOLLOWED_USER_ID', '=', $artistUserId)
                                ->first();

            $countArtistFollowing = DB::table('FOLLOWER')
                                    ->select(DB::raw("FORMAT(COUNT(*), 'N0') as TOTAL_FOLLOWING"))
                                    ->where('FOLLOWER_USER_ID', '=', $artistUserId)
                                    ->first();

            $averageArtistRating = DB::table('ARTIST_RATING')
                                ->select(DB::raw('ROUND(AVG(CAST(USER_RATING AS FLOAT)), 1) AS AVERAGE_RATING'))
                                ->where('ARTIST_ID', '=', $ARTIST_ID)
                                ->value('AVERAGE_RATING');
            $averageArtistRating = number_format($averageArtistRating, 1);
            $artistId = $ARTIST_ID;

            $latestPost = DB::table('post as P')
                        ->select([
                            'MU.USERNAME',
                            'MU.PROFILE_IMAGE_PATH',
                            'P.CONTENT',
                            'PM.POST_MEDIA_PATH',
                        ])
                        ->join('post_media as PM', 'PM.POST_ID', '=', 'P.POST_ID')
                        ->join('artist as A', 'A.ARTIST_ID', '=', 'P.ARTIST_ID')
                        ->join('master_user as MU', 'A.USER_ID', '=', 'MU.USER_ID')
                        ->orderBy('P.CREATED_AT', 'desc')
                        ->first();

            //render home
            $homeLatestWork = DB::table('ART')
                            ->select('ART.ART_ID', 'ART_IMAGE.IMAGE_PATH')
                            ->join('ART_IMAGE','ART_IMAGE.ART_ID','=','ART.ART_ID')
                            ->where('ART.ARTIST_ID','=',$ARTIST_ID)
                            ->where('IS_SALE','=',1)
                            ->limit(3)
                            ->orderBy('ART.CREATED_AT','desc')
                            ->get();
                    
            $homeLatestPortfolio = DB::table('ART')
                                ->select('ART.ART_ID', 'ART_IMAGE.IMAGE_PATH')
                                ->join('ART_IMAGE','ART_IMAGE.ART_ID','=','ART.ART_ID')
                                ->where('ART.ARTIST_ID','=',$ARTIST_ID)
                                ->where('IS_SALE','=',0)
                                ->limit(3)
                                ->orderBy('ART.CREATED_AT','desc')
                                ->get();

            //render portfolio
            $artistPortfolio =  DB::table('ART')
                            ->select('ART.ART_ID', 'ART_IMAGE.IMAGE_PATH','ART.ART_TITLE','ART.DESCRIPTION')
                            ->join('ART_IMAGE','ART_IMAGE.ART_ID','=','ART.ART_ID')
                            ->where('ART.ARTIST_ID','=',$ARTIST_ID)
                            ->where('IS_SALE','=',0)
                            ->orderBy('ART.CREATED_AT','desc')
                            ->get();

            $artCategoryMaster = DB::table('ART_CATEGORY_MASTER')
                            ->select('*')
                            ->get();
            
            //render collection
            $listCollection = DB::table('ARTIST_COLLECTION as artist')
                            ->select(
                                'ai.IMAGE_PATH',
                                'artist.COLLECTION_NAME',
                                'artist.ARTIST_COLLECTION_ID',
                                DB::raw('ISNULL((SELECT COUNT(*) 
                                                FROM ART_COLLECTION 
                                                WHERE ARTIST_COLLECTION_ID = artist.ARTIST_COLLECTION_ID), 0) AS TOTAL_ARTWORKS')
                            )
                            ->leftJoin(
                                DB::raw('(
                                    SELECT 
                                        ARTIST_COLLECTION_ID, 
                                        created_at, 
                                        ART_ID, 
                                        ROW_NUMBER() OVER (PARTITION BY ARTIST_COLLECTION_ID ORDER BY created_at DESC, ART_ID DESC) AS row_num
                                    FROM ART_COLLECTION
                                ) as unique_art'),
                                function ($join) {
                                    $join->on('artist.ARTIST_COLLECTION_ID', '=', 'unique_art.ARTIST_COLLECTION_ID')
                                        ->where('unique_art.row_num', '=', 1);
                                }
                            )
                            ->leftJoin('ART_COLLECTION as ac', function ($join) {
                                $join->on('artist.ARTIST_COLLECTION_ID', '=', 'ac.ARTIST_COLLECTION_ID')
                                    ->on('ac.ART_ID', '=', 'unique_art.ART_ID');
                            })
                            ->leftJoin('ART_IMAGE as ai', 'ai.ART_ID', '=', 'ac.ART_ID')
                            ->orderBy('artist.CREATED_AT', 'desc')
                            ->get();

            //render post
            $listPost = DB::table('POST as P')
                        ->select([
                            DB::raw('CAST(P.POST_ID AS BIGINT) as POST_ID'),
                            'MU.USER_ID',
                            'MU.PROFILE_IMAGE_PATH',
                            'MU.USERNAME',
                            'P.CONTENT',
                            DB::raw("FORMAT(CONVERT(DATE, P.created_at), 'd MMMM yyyy') AS CREATED_DATE"),
                            'PM.POST_MEDIA_PATH',
                            DB::raw("
                                COALESCE(
                                    CASE
                                        WHEN TOTAL_COMMENT.CNT_CMMT > 999 THEN CONCAT(ROUND(TOTAL_COMMENT.CNT_CMMT / 1000, 1), 'K')
                                        ELSE COALESCE(TOTAL_COMMENT.CNT_CMMT, 0)
                                    END,
                                    '0'
                                ) AS TOTAL_COMMENT
                            "),
                            DB::raw("
                                COALESCE(
                                    CASE
                                        WHEN TOTAL_LIKE.CNT_LIKE > 999 THEN CONCAT(ROUND(TOTAL_LIKE.CNT_LIKE / 1000, 1), 'K')
                                        ELSE COALESCE(TOTAL_LIKE.CNT_LIKE, 0)
                                    END,
                                    '0'
                                ) AS TOTAL_LIKE
                            "),
                            DB::raw('COUNT(PL.USER_ID) as IS_LIKED')
                        ])
                        ->join('ARTIST as A','P.ARTIST_ID', '=', 'A.ARTIST_ID')
                        ->join('MASTER_USER as MU', 'A.USER_ID', '=', 'MU.USER_ID')
                        ->join('POST_MEDIA as PM', 'P.POST_ID', '=', 'PM.POST_ID')
                        ->leftJoinSub(
                            DB::table('POST_COMMENT')
                                ->select('POST_ID', DB::raw('COUNT(*) as CNT_CMMT'))
                                ->groupBy('POST_ID'),
                            'TOTAL_COMMENT',
                            'P.POST_ID',
                            '=',
                            'TOTAL_COMMENT.POST_ID'
                        )
                        ->leftJoinSub(
                            DB::table('POST_LIKE')
                                ->select('POST_ID', DB::raw('COUNT(*) as CNT_LIKE'))
                                ->groupBy('POST_ID'),
                            'TOTAL_LIKE',
                            'P.POST_ID',
                            '=',
                            'TOTAL_LIKE.POST_ID'
                        )
                        ->leftJoin('POST_LIKE as PL', function($join) {
                            $join->on('P.POST_ID', '=', 'PL.POST_ID')
                                ->where('PL.USER_ID', '=', auth()->id()); // This checks if the current user has liked the post
                        })
                        ->orderBy('P.created_at', 'desc')
                        ->groupBy(
                            'P.POST_ID', 
                            'MU.USER_ID', 
                            'MU.PROFILE_IMAGE_PATH', 
                            'MU.USERNAME', 
                            'P.CONTENT', 
                            'PM.POST_MEDIA_PATH', 
                            'TOTAL_COMMENT.CNT_CMMT', 
                            'TOTAL_LIKE.CNT_LIKE', 
                            'P.created_at' // Add created_at to the GROUP BY clause
                        )
                        ->get();

            //render ArtWork
            $artistArtwork =  DB::table('ART')
                            ->select('ART.ART_ID', 'ART_IMAGE.IMAGE_PATH','ART.ART_TITLE','ART.DESCRIPTION')
                            ->join('ART_IMAGE','ART_IMAGE.ART_ID','=','ART.ART_ID')
                            ->where('ART.ARTIST_ID','=',$ARTIST_ID)
                            ->limit(6)
                            ->orderBy('ART.CREATED_AT','desc')
                            ->get();

            //render about
            $countTotalRating = DB::table('ARTIST_RATING')
                            ->select('*')
                            ->count();
      
            $allRatings = [1, 2, 3, 4, 5];

            $userRatingPercentage = DB::table(DB::raw('(SELECT 1 AS USER_RATING UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5) AS ALL_RATINGS'))
                                ->leftJoin('ARTIST_RATING as ar', 'ALL_RATINGS.USER_RATING', '=', 'ar.USER_RATING')
                                ->select('ALL_RATINGS.USER_RATING', DB::raw('COALESCE(COUNT(ar.USER_RATING), 0) AS COUNT'))
                                ->groupBy('ALL_RATINGS.USER_RATING')
                                ->orderBy('ALL_RATINGS.USER_RATING', 'desc')
                                ->get();

            $rating = DB::table('ARTIST_RATING as AR')
                    ->join('ARTIST as a', 'a.ARTIST_ID', '=', 'AR.ARTIST_ID')
                    ->join('MASTER_USER as MU', 'MU.USER_ID', '=', 'AR.USER_ID')
                    ->where('a.ARTIST_ID', 1)
                    ->select(
                        'AR.CONTENT',
                        'MU.USERNAME',
                        'MU.PROFILE_IMAGE_PATH',
                        'AR.USER_RATING',
                        DB::raw("
                            CASE
                                WHEN DATEDIFF(DAY, AR.CREATED_AT, GETDATE()) <= 0 THEN 'Today'
                                WHEN DATEDIFF(YEAR, AR.CREATED_AT, GETDATE()) >= 1 THEN CAST(DATEDIFF(YEAR, AR.CREATED_AT, GETDATE()) AS VARCHAR) + ' Years ago'
                                WHEN DATEDIFF(MONTH, AR.CREATED_AT, GETDATE()) >= 1 THEN CAST(DATEDIFF(MONTH, AR.CREATED_AT, GETDATE()) AS VARCHAR) + ' Months ago'
                                ELSE CAST(DATEDIFF(DAY, AR.CREATED_AT, GETDATE()) AS VARCHAR) + ' Days ago'
                            END AS COMMENT_TIME
                        ")
                    )
                    ->orderBy('AR.CREATED_AT', 'desc')
                    ->get();

            return view('artists.show', compact('artist', 'countArtistView','countArtistLikes','countArtistFollowers','latestPost', //SIDE ARTIST PROFILE DATA
                                                'countArtistFollowing','averageArtistRating','section', 'artistId','artistUserId',
                                                'homeLatestWork','homeLatestPortfolio', //HOME RENDER
                                                'artistPortfolio','artCategoryMaster',// PORTFOLIO RENDER
                                                'listCollection', // COLLECTION RENDER
                                                'artistArtwork', // ARTWORK RENDER
                                                'listPost',// POST RENDER
                                                'countTotalRating','userRatingPercentage','rating')); //ABOUT RENDER

        }

    }
    
    public function showCollection($artistId, $ARTIST_COLLECTION_ID)
    {
        // Example data for the artworks
        $artworks = DB::table('ART_COLLECTION')
                    ->select(
                        'ART.ART_ID', 
                        'ART.ART_TITLE', 
                        'ART_IMAGE.IMAGE_PATH', 
                        'MASTER_USER.USERNAME',
                        'ART.IS_SALE', 
                        DB::raw("FORMAT(ART.PRICE, 'N0') as ART_PRICE"), 
                        DB::raw("YEAR(ART.CREATED_AT) as ART_YEAR")
                    )
                    ->join('ART', 'ART.ART_ID', '=', 'ART_COLLECTION.ART_ID')
                    ->join('ART_IMAGE', 'ART.ART_ID', '=', 'ART_IMAGE.ART_ID')
                    ->join('ARTIST', 'ARTIST.ARTIST_ID', '=', 'ART.ARTIST_ID')
                    ->join('MASTER_USER', 'MASTER_USER.USER_ID', '=', 'ARTIST.USER_ID')
                    ->where('ART_COLLECTION.ARTIST_COLLECTION_ID', '=', $ARTIST_COLLECTION_ID)
                    ->get(); 
        
        $artworksNoCollection = DB::table('ART as A')
                                ->select('A.ART_ID', 'A.ART_TITLE', 'A.DESCRIPTION', 'AI.IMAGE_PATH')
                                ->join('ART_IMAGE as AI', 'A.ART_ID', '=', 'AI.ART_ID')
                                ->where('A.ARTIST_ID', $artistId)
                                ->whereNotExists(function ($query) use ($ARTIST_COLLECTION_ID) {
                                    $query->select(DB::raw(1))
                                        ->from('ART_COLLECTION')
                                        ->whereColumn('ART_COLLECTION.ART_ID', 'A.ART_ID')
                                        ->where('ART_COLLECTION.ARTIST_COLLECTION_ID', $ARTIST_COLLECTION_ID);
                                })
                                ->get();
                            
        $artistUser = DB::table('ARTIST')
                    ->select('USER_ID')
                    ->where('ARTIST_ID', '=', $artistId)
                    ->first();
                
        $artistUserId = $artistUser ? $artistUser->USER_ID : null;

        $artistCollectionId = $ARTIST_COLLECTION_ID;
        $totalArtWorks = DB::table('ART_COLLECTION')
                        ->select('*')
                        ->where('ARTIST_COLLECTION_ID','=',$ARTIST_COLLECTION_ID)
                        ->count();

        return view('artists.sections.collection-detail', compact('artworks', 'artistCollectionId','totalArtWorks','artworksNoCollection', 'artistUserId'));
    }

    public function getArtistProfile($artistId){

        // Fetch the artist and related user data
        $artist = DB::table('ARTIST')
                ->join('MASTER_USER', 'ARTIST.USER_ID', '=', 'MASTER_USER.USER_ID')
                ->where('ARTIST.ARTIST_ID', '=', $artistId)
                ->select(
                    'MASTER_USER.USERNAME as name',
                    'MASTER_USER.EMAIL as email',
                    'MASTER_USER.PROFILE_IMAGE_PATH as profile_image',
                    'ARTIST.LOCATION as location',
                    'ARTIST.BIO as bio',
                    'ARTIST.JOIN_DATE as join_date',
                    'ARTIST.ROLE as role'
                )
                ->first();

        // Check if artist exists
        if (!$artist) {
            return response()->json(['error' => 'Artist not found'], 404);
        }

        return response()->json($artist);
    }

    public function updateArtistProfile(Request $request)
    {
        try {
            // Get the artist ID from the request
            $artistId = $request->input('artistId');
            $artist = Artist::findOrFail($artistId);
            $userId = $artist->USER_ID;

            // Validate the input
            $validated = $request->validate([
                'name' => [
                    'required',
                    'string',
                    'max:20',
                    Rule::unique('MASTER_USER', 'USERNAME')->ignore($userId, 'USER_ID'),
                ],
                'bio' => 'nullable|string|max:255',
                'headline' => 'nullable|string|max:255',
                'location' => 'nullable|string|max:100',
                'profile_picture' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'name.required' => '* The username field is required.',
                'name.max' => '* The username must not exceed 20 characters.',
                'name.unique' => '* This username is already taken.',
                'bio.max' => 'The bio must not exceed 255 characters.',
                'headline.max' => 'The headline must not exceed 255 characters.',
                'location.max' => 'The location must not exceed 100 characters.',
                'profile_picture.mimes' => '* Please upload a valid image (jpeg, png, jpg, gif).',
            ]);

            // Update the user table
            $user = MasterUser::findOrFail($userId);
            $user->USERNAME = $validated['name'];

            // Process profile picture if uploaded
            if ($request->hasFile('profile_picture')) {
                $imagePath = $request->file('profile_picture')->store('uploads', ['disk' => 'public']);
                $user->PROFILE_IMAGE_PATH = '/storage/' . $imagePath;
            }

            $user->save();

            // Update the artist table
            $artist->BIO = $validated['bio'] ?? $artist->BIO;
            $artist->ROLE = $validated['headline'] ?? $artist->ROLE;
            $artist->LOCATION = $validated['location'] ?? $artist->LOCATION;
            $artist->save();

            return response()->json(['message' => 'Profile updated successfully!']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }
        
}
