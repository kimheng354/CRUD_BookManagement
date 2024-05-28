<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{   

    public function show(){
      $books =Book::orderBy("id" ,"desc")->get();
      return view('book.showbook',compact('books'));
    }

    public function store(Request $request){ 
       
        $request ->validate([
            'titles' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'cover' => 'required|image|mimes:png,jpg,jpeg,gif|max:2048',
        ]);

        // dd($request->input());
        $book = new Book();
        $book -> titles = $request->titles;
        $book -> slug = $request->slug;
        $book -> slug = strtolower( str_replace(' ','-' , $request->slug)); //use replace if user input with space cover to - and covert to lower case 
        $book -> description = $request->description;
        //get only extention of file cover 
        $extension = $request->file('cover')->extension();
        $filename = date('Y-m-d-H-i-s'). '.' .$extension; //Convert to 2024-05-24.jpg
        $request ->file('cover')->move(public_path('uploads/'),$filename); //move to public with uploads folder
        $book->covers = $filename;
        $book->save();
        
        return redirect(route('book.show'))->with('success','Book Have Successfully Uploads ');
    }

    public function edit($id){
        $book =Book::where('id',$id)->first();
        return view('book.edit',compact('book'));
    }

    public function update($id , Request $request){
        $request ->validate([
            'titles' => 'required',
            'slug' => 'required',
            'description' => 'required'
        ]);
        $book =Book::where('id',$id)->first(); //get Data book from Db them check image to update
        // Check if a new cover file is uploaded
        if ($request->hasFile('cover')) {
            $request->validate([
                'cover' => 'required|image|mimes:png,jpg,jpeg,gif|max:2048'
            ]);
            if (file_exists(public_path('uploads/'.$book->covers)) And !empty($book->covers)) {
                unlink(public_path('uploads/'.$book->covers));
            }
             //get only extention of file cover 
            $extension = $request->file('cover')->extension();
            $filename = date('Y-m-d-H-i-s'). '.' .$extension; //Convert to 2024-05-24.jpg
            $request ->file('cover')->move(public_path('uploads/'),$filename); //move to public with uploads folder
            $book->covers = $filename;
        };

        // dd($request->input());
        $book -> titles = $request->titles;
        $book -> slug = $request->slug;
        $book -> slug = strtolower( str_replace(' ','-' , $request->slug)); //use replace if user input with space cover to - and covert to lower case 
        $book -> description = $request->description;
    
        $book->update();

        return redirect(route('book.show'))->with('success','Book Have been Update Successfully');
    }
    public function delete($id){
        $book =Book::where('id',$id)->first();
        if (file_exists(public_path('uploads/'.$book->covers)) && !empty($book->covers)) {
            unlink(public_path('uploads/'.$book->covers)); //delete image with id DB and local image that store in publice upload folder
        }
        $book->delete();
        return redirect(route('book.show'))->with('success','Book Have been Deleted');
    }
}
