@extends('layouts.app')
@section('content')
<div class="w-4/5 m-auto text-center">
    <div class="py-15  ">
        <h1 class="text-6xl">
           Create Posts
        </h1>

    </div>
</div>
<div>
    <form 
    action="/blog"
    method="POST"
    enctype="multipart/form-data">
    @csrf 
    <input
     type="text"
     name="title"
     placeholder="Title..."
     class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">
     
     <textarea 
     name="description" 
     placeholder="Description..."
     class="bg-transparent block border-b-2 w-full h-60 text-6xl outline-none"></textarea>
     
     <div class="bg-grey-lighter pt-15">
       <label
        class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg 
        shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
        <span class="mt-2 text-base leading-normal">
            Select a file
        </span>
        <input type="file"
        name="image"
        class="hidden">
    </label>
     </div>
     <button 
     type="sumbit"
     class="uppercase mt-15 bg-gray-700 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl ">
      Submit Post
     </button>
</form>

    
</div>
@endsection