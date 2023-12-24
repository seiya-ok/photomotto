<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Https\Requests\PhotoRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Cloudinary;

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
        $photo = new Photo;
        return view('photos.create', compact('categories'));
    }
    public function show(Photo $photo)
    {
       return view('photos.show')->with(['photo' => $photo]);
    }

    public function store(Request $request)
{
    //   $request->validate([
    //     'photo.name' => 'required',
    //     'photo.image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     'photo.category_id' => 'required|exists:categories,id',
    //     'photo.date_taken' => 'date',
    //     'photo.location' => 'required',
    // ]);

    $photo = new Photo;

    $photo->name = $request->input('photo.name');
    $photo->category_id = $request->input('photo.category_id');
    $photo->date_taken = $request->input('photo.date_taken');
    $photo->location = $request->input('photo.location');
    $photo->camerabody = $request->input('photo.camerabody');
    $photo->cameralens = $request->input('photo.cameralens');
    $photo->camerasoft = $request->input('photo.camerasoft');
    $photo->description = $request->input('photo.description');
    $image_url = Cloudinary::upload($request->file('photo.image')->getRealPath())->getSecurePath();

    // データベースに画像の URL を保存
    $photo->photo_file = $image_url;

    $photo->save();

    return redirect('/photos/' . $photo->id);
}
    
}