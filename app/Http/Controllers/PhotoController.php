<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Photo;
use App\Model\Category;
use Auth;

class UploadController extends Controller
{
  public function index()
  {
     $photos = Photo::all(); 
     
     return view('photos.index',compact('photos'));
  }
  
  public function create()
  {
    $categories = Category::all();
    
    return view('photos.create',compact('categories'));
  }
  
  public function store (Request $reqest)
  {
    $request->validate([
      'name' => 'required',
      'photo_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);
      
      $imagePath = $reqest->file('photo_file')->store('photos','public');
      
      Photo::create([
        'user_id' => Auth::id(),
        'category_id' => $request->category_id,
        'name' => $request->name,
        'photo_file' => $imagePath,
        'description' => $request->description,
        'location' => $request->location,
        'tag' => $request->tag,
        'date_taken' => $request->date_taken,
        ]);
        
      return redirect()->route('photos.index')
           ->with('success', 'Image uploaded successfully.');
  }
  
  
}
