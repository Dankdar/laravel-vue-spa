<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function showFavouriteList(Request $request){
        $data=$request->toArray();
        $uid = $request->id;
        return $favlist = DB::table('movies_users')
            ->where('user_id',$uid)
            ->join('movies', 'movies.movie_id', '=', 'movies_users.movie_id')
            ->get();
    }

    public function showAll(Request $request){
        $data=$request->ToArray();
        $variable =$request->id;
       return $movlist = DB::table('movies')
            ->select('movies.*', DB::raw('count(movies_users.movie_id) likes_count'))
            ->leftJoin('movies_users','movies.movie_id','=','movies_users.movie_id')
            ->groupBy('movies.movie_id')
            ->orderBy('likes_count', 'DESC')
            ->get();
    }

    public function like(Request $request){
        $user_id =$request->id;
        $movie_id = $request->movie_id;
        $liked_where = DB::table('movies_users')
            ->where(array('user_id'=>$user_id, 'movie_id'=>$movie_id))
            ->get();
        if($liked_where->isEmpty())
        {
            $liker = DB::table('movies_users')
                ->insert(array('user_id'=>$user_id, 'movie_id'=>$movie_id));
            return $liked = 'Succesfully Added to your Favorites';
        }
        else
        {
            return $liked = 'Already Added to your Favorites';
        }
    }

    public function dislike(Request $request){
        $data=$request->ToArray();
        $user_id =$request->id;
        $movie_id = $request->movie_id;
        return $disliked = DB::table('movies_users')
            ->where('user_id','=',$user_id )
            ->where('movie_id','=',$movie_id)
            ->delete();
//        dd($added);
    }

    public function index()
    {
        return view('search');
    }

    public function search(Request $request)
    {
        $keyword = $request->keywords;
        return $results = DB::table('movies')
            ->where('movie_name','LIKE','%'.$keyword.'%')
            ->get();
    }




}
