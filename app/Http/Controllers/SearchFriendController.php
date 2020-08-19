<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SearchFriendController extends Controller
{
    public function __construct() {
        // $this->middleware('auth');
        // $this->middleware('auth')->except(['main','edit']);
     }
    public function index(Request $request)
    {
        $id=(auth()->user()->id);   
        /*     
        if($request){
            $query = trim($request->get('search'));
            $user=User::searchFriend($id)
              //  ->where('name','LIKE','%'. $query .'%')
              //  ->where('status','=',true)
              //  ->where('admin','=',false)
              //  ->where('id','!=',$id)
                ->get($query,)
              //  ->orderBy('id','asc')
                ;
            return view('solicitudes.search',['users'=>$user,'search'=>$query]);
        }*/
        $user = User::searchFriend($id);
        return view('solicitudes.search')->with([
            'users' => $user,
         ]);
    }
}
