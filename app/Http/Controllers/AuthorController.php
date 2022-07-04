<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(){
        $authors = Author::get();
        return view("authors.index", compact("authors"));
    }

    public function create(){

        return view("authors.create");
    }

    public function store(Request $request){



        $request->validate([
            "name" => "required|string|max:100|min:3",
            "bio"  => "required|string|min:3",
            "img"   => "required|image",
            // "cat_ids"  => "required",
            // "cat_is.*" =>"exists:cats,id"

        ]);



        $img = $request->file("img");
        $ext = $img->getClientOriginalExtension();
        $imgName = uniqid() . ".$ext";

        $img->move(public_path("uploads/Authors/") , $imgName);




         Author::create([
            "name" => $request->name,
            "bio"  => $request->bio,
            "img"   =>$imgName,

        ]);

        // $book->cats()->sync($request->cat_ids);

        return redirect(route("authors.index"));

    }

    public function edit($id){

        $author = Author::findOrFail($id);
        return view("authors.edit" , compact("author"));

    }



    public function update($id , Request $request){
        $request->validate([
            "name" => "required|string|max:100|min:3",
            "bio"  => "required|string|min:3",
            "img"  => "nullable|image"
        ]);


        $author = Author::findOrFail($id);
        $name = $author ->img;                 # From DB

        if($request->hasFile("img")){

            if($name !== null){
                unlink(public_path("uploads/Authors/").$name);
            }



        $img = $request->file("img");
        $ext = $img->getClientOriginalExtension();
        $name = uniqid() . ".$ext";
        $img->move(public_path("uploads/Authors/") , $name);


}


        $author->update([
            "name" => $request->name,
            "bio"  => $request->bio,
            "img"   => $name,
        ]);

        return redirect( route("authors.index"));
}

    public function delete($id){

        $author = Author::findOrFail($id);
        unlink(public_path("uploads/Authors/").$author->img);

        $author->delete();

        return redirect(route("authors.index"));
    }


}
