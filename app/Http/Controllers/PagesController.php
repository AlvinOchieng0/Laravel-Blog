<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    public function index()
    {
        return view('index');
    }

    
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        
    }

    public function show(Pages $pages)
    {
        
    }

    
    public function edit(Pages $pages)
    {
        
    }

    
    public function update(Request $request, Pages $pages)
    {
        
    }

    
    public function destroy(Pages $pages)
    {
    
    }
}
