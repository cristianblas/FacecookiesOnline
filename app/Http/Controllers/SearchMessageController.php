<?php

namespace App\Http\Controllers;

use App\Friend;
use Illuminate\Http\Request;

class SearchMessageController extends Controller
{
    public function index(Request $request)
    {   
        $id=(auth()->user()->id);
        if($request){
            $query = trim($request->get('search'));
            $users = Friend::getContactos2($id,$query);
            return view('chats.index',['users'=>$users,'search'=>$query]);
        }
        $users = Friend::getContactos($id);
        return view('chats.index')->with([
            'users'=>$users
        ]);

       
    }
}
