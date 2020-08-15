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
    public function index()
    {
        $user = User::all();
        return view('user.main')->with([
             'users' => User::all(),
        ]);
    }
    public function create(){
        return view('user.create');
        
    }
    public function store(Request $request){

     //   dd($request->all());
       // $datos['date']=$request->get('name');
       // dd($datos);
        
        User::create([
            
            'name' => $request['name'],
            'last_name' =>$request['last_name'],
            'years' => $request['years'],
            'telephone' => $request['telephone'],
            'email' => $request['email'],
            'gender' => $request['gender'],
            'password' => Hash::make($request['password']),
        ]);
        
        return redirect()->route('usuarios.index');




       /*
        $rules = [
            'title' => ['required','max:255'],
            'description' => ['required','max:1000'],
            'price' => ['required','min:1'],
            'stock' => ['required','min:0'],
            'status' => ['required','in:available,unavailable'],
        ];
        request()->validate($rules);


        if(request()->status == 'available' && request()->stock == 0){
            return redirect()
                ->back()
                ->withInput(request()
                ->all())
                ->withErrors('If available must be have stock');

        }


      //  $product = Product::create([
        //    'title' => request()->title,
         //   'description' =>request()->description,
         //   'price' => request()->price,
         //   'stock'=> request()->stock,
          //  'status'=>request()->status,
      //  ]);

      $product = Product::create(request()->all());
     // session()->flash('success', "the new product with id {$product->id} was created");

       // return redirect()->back();
       // return redirect()->action('ProductsController@main');
      
       return redirect()->route('products.main')
        
            ->withSuccess("the new product with id {$product->id} was created");
*/ 
    }
    /*
    public function show(Product $product){
        //  $product = Product::findOrFail($product);
          return view('products.show')->with([
              'product' => $product,
  
          ]);
      }
      public function edit($product){
          return view('products.edit')->with([
              'product' => Product::findOrFail($product),
          ]);
      }
      public function update($product){
          $rules = [
              'title' => ['required','max:255'],
              'description' => ['required','max:1000'],
              'price' => ['required','min:1'],
              'stock' => ['required','min:0'],
              'status' => ['required','in:available,unavailable'],
          ];
          request()->validate($rules);
          $product = Product::findOrFail($product);
          $product->update(request()->all());
          return redirect()->route('products.main')
          ->withSuccess("the new product with id {$product->id} was Edited");
  
      }
      public function destroy($product){
          $product = Product::findOrFail($product);
          $product->delete();        
          return redirect()->route('products.main')
          ->withSuccess("the new product with id {$product->id} was deleted");
          
      }
      */
}
