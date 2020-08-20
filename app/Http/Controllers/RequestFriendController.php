<?php

namespace App\Http\Controllers;

use App\Friend;
use App\User;
use App\Chat;
use Illuminate\Http\Request;

class RequestFriendController extends Controller
{
    public function index()
    {   
        $id=(auth()->user()->id);
        $friend = Friend::getSolicitudes($id);
        return view('solicitudes.index')->with([
            'solicitudes' => $friend
        ]) 
        ;
        
    }
    public function store($id){
        $id2=(auth()->user()->id);        
        Friend::create([
            'id_solicitante' =>$id2 ,
            'id_solicitado' =>$id,
        ]);
        return redirect()->route('busquedas.index'); 
    }
    public function edit($id){
        Friend::updateSolicitud($id);
        return redirect()->route('solicitudes.index');
    }
    public function destroy($id){
        Friend::deleteSolicitud($id);
        return redirect()->route('solicitudes.index');
    }
    

}
