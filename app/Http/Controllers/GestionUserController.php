<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class GestionUserController extends Controller
{
    public function __construct() {
        // $this->middleware('auth');
        // $this->middleware('auth')->except(['main','edit']);
     }
     public function index(Request $request)
     {        
         if($request){
             $query = trim($request->get('search'));
             $users = User::getUser($query);
         } else {
             $users= User::all();
         }
 
         return view('user.main')->with([
              'users' => $users
         ]);
     }
    public function create(){
        return view('user.create');
        
    }
    public function store(Request $request){

        User::create([
            
            'name' => $request['name'],
            'last_name' =>$request['last_name'],
            'years' => $request['years'],
            'telephone' => $request['telephone'],
            'email' => $request['email'],
            'gender' => $request['gender'],
            'password' => Hash::make($request['password']),
            'font' => 15,
            'style' =>'primary',
        ]);
        
        return redirect()->route('usuarios.index')
        ->withSuccess("the new user  was created"); 
    }
    public function edit($user){
          return view('User.edit')->with([
              'user' => User::findOrFail($user),
          ]);
      }
    public function update($user){
          $user = User::findOrFail($user);
          $user->update(request()->all());
          if($user->admin==true){
          return redirect()->route('usuarios.index')
          ->withSuccess("the user was Edited");
        }
        return redirect()->route('home')
        ->withSuccess("the user was Edited");
      }
    public function destroy($user){
          $user = User::findOrFail($user);
          $user->delete();        
          return redirect()->route('usuarios.index')
          ->withSuccess("the user was deleted");   
      }
      public function editUser($user){
        return view('usuario.edit')->with([
            'user' => User::findOrFail($user),
        ]);
    }
      public function updateUser($user){
        $user = User::findOrFail($user);
        $user->update(request()->all());
        return redirect()->route('home')
        ->withSuccess("the user was Edited");

    }
    public function change($color){
        $my_id=(auth()->user()->id);
        $style=User::find($my_id);
        $style->style=$color;
        $style->save();
        return redirect()->route('home');
    }
    public function changeFont($tamaño){
        $my_id=(auth()->user()->id);
        $font=User::find($my_id);
        $font->font=$tamaño;
        $font->save();
        return redirect()->route('home');
    }

}
