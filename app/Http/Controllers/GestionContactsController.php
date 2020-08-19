<?php

namespace App\Http\Controllers;
use App\User;
use App\Friend;
use Illuminate\Http\Request;

class GestionContactsController extends Controller
{
    public function __construct() {
        // $this->middleware('auth');
        // $this->middleware('auth')->except(['main','edit']);
     }
    public function index()
    {   
        $id=(auth()->user()->id);
        $contacts = Friend::getContactos($id);
        return view('contactos.index')->with([
            'contactos' => $contacts
        ]) 
        ;
        
    }
    public function edit($id){
        Friend::deleteSolicitud($id);
        return redirect()->route('contactos.index');
    }
}
