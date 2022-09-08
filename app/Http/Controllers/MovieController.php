<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function showFavouriteList(Request $request){
        $data=$request->toArray();
        $uid = $request->id;
        return $favlist = DB::table('movies_users')->where('user_id',$uid)->join('movies', 'movies.movie_id', '=', 'movies_users.movie_id')->get();

//        return $history = Movie::where('user_id',$tid)->orderBy('created_at', 'desc')->get();
}
}
