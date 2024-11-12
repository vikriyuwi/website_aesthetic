<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                            ->select('ART.ART_ID', 'ART_IMAGE.IMAGE_PATH')
                            ->join('ART_IMAGE','ART_IMAGE.ART_ID','=','ART.ART_ID')
                            ->where('ART.ARTIST_ID','=',$ARTIST_ID)
                            ->where('IS_SALE','=',0)
                            ->orderBy('ART.CREATED_AT','desc')
                            ->get();
            
            //render collection
            $listCollection = DB::table('ART_COLLECTION as ac')
                            ->select(
                                'ai.IMAGE_PATH', 
                                'artist.COLLECTION_NAME', 
                                'ac.ARTIST_COLLECTION_ID', 
                                DB::raw('(SELECT COUNT(*) FROM ART_COLLECTION WHERE ARTIST_COLLECTION_ID = ac.ARTIST_COLLECTION_ID) AS TOTAL_ARTWORKS')
                            )
                            ->join(
                                DB::raw('(SELECT ARTIST_COLLECTION_ID, MAX(created_at) as latest_created_at FROM ART_COLLECTION GROUP BY ARTIST_COLLECTION_ID) as latest'),
                                function ($join) {
                                    $join->on('ac.ARTIST_COLLECTION_ID', '=', 'latest.ARTIST_COLLECTION_ID')
                                        ->on('ac.created_at', '=', 'latest.latest_created_at');
                                }
                            )
                            ->join('ART_IMAGE as ai', 'ai.ART_ID', '=', 'ac.ART_ID')
                            ->join('ARTIST_COLLECTION as artist', 'ac.ARTIST_COLLECTION_ID', '=', 'artist.ARTIST_COLLECTION_ID')
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
                                WHEN DATEDIFF(YEAR, AR.CREATED_AT, GETDATE()) >= 1 THEN CAST(DATEDIFF(YEAR, AR.CREATED_AT, GETDATE()) AS VARCHAR) + ' year ago'
                                WHEN DATEDIFF(MONTH, AR.CREATED_AT, GETDATE()) >= 1 THEN CAST(DATEDIFF(MONTH, AR.CREATED_AT, GETDATE()) AS VARCHAR) + ' month ago'
                                ELSE CAST(DATEDIFF(DAY, AR.CREATED_AT, GETDATE()) AS VARCHAR) + ' day ago'
                            END AS COMMENT_TIME
                        ")
                    )
                    ->orderBy('AR.CREATED_AT', 'desc')
                    ->get();

            return view('artists.show', compact('artist', 'countArtistView','countArtistLikes','countArtistFollowers', //SIDE ARTIST PROFILE DATA
                                                'countArtistFollowing','averageArtistRating','section', 'artistId',
                                                'homeLatestWork','homeLatestPortfolio', //HOME RENDER
                                                'artistPortfolio',// PORTFOLIO RENDER
                                                'listCollection', // COLLECTION RENDER
                                                'countTotalRating','userRatingPercentage','rating')); //ABOUT RENDER

        }

    }
    public function showCollection($ARTIST_COLLECTION_ID)
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

        $artistCollectionId = $ARTIST_COLLECTION_ID;
        $totalArtWorks = DB::table('ART_COLLECTION')
                        ->select('*')
                        ->where('ARTIST_COLLECTION_ID','=',$ARTIST_COLLECTION_ID)
                        ->count();

        return view('artists.sections.collection-detail', compact('artworks', 'artistCollectionId','totalArtWorks'));
    }
}
