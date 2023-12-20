<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::paginate(config('app.pagination_count',10)); 
        return view('photos.index', compact('photos'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('photos.create', compact('categories'));
    }
    public function show(Photo $photo)
    {
        return view('photos.show')->with(['photo' => $photo]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'date_taken' => 'date', 
        ]);

        $imagePath = $request->file('photo_file')->store(config('app.photo_directory','photos'), 'public');

        $photoData = [
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'name' => $request->name,
            'photo_file' => $imagePath,
            'description' => $request->description,
            'location' => $request->location,
            'tag' => $request->tag,
            'date_taken' => $request->date_taken,
        ];
        
        $photo = Photo::create($photoData);
        
        return redirect()->route('photos.show',$photo)->with('success','写真が保存されました。');

    }
   
}