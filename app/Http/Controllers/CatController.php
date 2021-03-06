<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;

class CatController extends Controller
{

    public function index(){
        $cats =  Cat::withCount("books")->get();
        return view("cats.index" , compact("cats"));
    }



     public function show($id){
         $cat = cat::findOrfail($id);
         $cats =  Cat::withCount("books")->get();
         return view("cats.show",
        [
            "cat"=>$cat,
            "cats"=>$cats

        ]);
     }

     public function create(){
         return view("cats.create");
     }

     public function store(Request $request){
         $request->validate([
             "name" => "required|string|max:100|min:3|unique:cats,name",
         ]);

         cat::create([
             "name" => $request->name,
         ]);

         return redirect(route("cats.index"));

     }


     public function edit($id){

         $cat = Cat::findOrFail($id);
         return view("cats.edit" , compact("cat"));
     }



     public function update($id , Request $request){
         $request->validate([
             "name" => "required|string|max:100|min:3",

         ]);

         Cat::findOrFail($id)->update([
             "name" => $request->name,

         ]);

         return redirect( route("cats.index"));
     }

     public function delete($id){

        Cat::findOrFail($id)->delete();
        return redirect(route("cats.index"));
     }



}
