<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Message;
use App\Friend;
use Illuminate\Http\Request;

class GestionMessageController extends Controller
{
    public function index()
    {   
        $id=(auth()->user()->id);
        $users = Friend::getContactos($id);
        $contacts = Chat::getChats($id);
        return view('chats.index')->with([
            'contactos' => $contacts,
            'users'=>$users
        ]) 
        
        ;
       
    }
}
