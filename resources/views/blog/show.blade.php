@extends('layouts.app')
@section('content')
<div class="w-4/5 m-auto text-center">
    <div class="py-15  ">
        <h1 class="text-6xl">
           {{$posts->title}}
        </h1>

    </div>
</div>
<div class="w-4/5 m-auto pt-20 ">
  <span class="text-gray-500">
     By<span class="font-bold-italic text-gray-800 ">{{$posts->user->name}}
       </span> ,Created on {{date('jS M Y',strtotime($posts->updated_at))}}
    </span>
  </span> 
  <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
    {{$posts->description}}
    </p> 
    
</div>
@endsection