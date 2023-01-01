<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    
    public function index()
    { 
       return view('blog.index')
       ->with('posts',Posts::orderBy('updated_at','DESC')->get());
       

    }

    
    public function create()
    {
        return view('blog.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
        'title'=>'required',
        'description'=>'required',
        'image'=>'required|mimes:jpg,png,jpeg|max:5048'
        ]);
        
        $newImageName=uniqid() . '-' . $request->title . '.' .
        $request->image->extension();
        $request->image->move(public_path('image'),$newImageName);
   
        
        Posts::create([
         'title'=>$request->input('title'),
         'description'=>$request->input('description'),
         'slug'=>SlugService::createSlug(Posts::class,'slug',$request->title),
         'image_path'=>$newImageName,
         'user_id'=>Auth()->user()->id
        ]);

        return redirect('/blog')
        ->with('message','Your post has been added!');
    }

    
    public function show($slug)
    {
        return view('blog.show')
        ->with('posts',Posts::where('slug',$slug)->first());
    }

    
    public function edit($slug)
    {
     return view('blog.edit')->with('posts',Posts::where('slug' ,$slug)->first());   
    }

    
    public function update(Request $request, $slug)
    {
       Posts::where('slug',$slug)
        ->update([
        'title'=>$request->input('title'),
         'description'=>$request->input('description'),
         'slug'=>SlugService::createSlug(Posts::class,'slug',$request->title),
         'user_id'=>Auth()->user()->id
        ]);
        return redirect('/blog')->with('message','Your post has been updated');
    }

    
    public function destroy(Posts $posts)
    {
        
    }
}
