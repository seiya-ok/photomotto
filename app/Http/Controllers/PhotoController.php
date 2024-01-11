<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Https\Requests\PhotoRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Cloudinary;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

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
    
    public function list()
    {
        $photos = Photo::withCount('likes')->paginate(config('app.pagination_count',10));
        $user = Auth::user();
        return view('photos.list', compact('photos','user'));
    }

    public function store(Request $request)
{
      $request->validate([
        'photo.name' => 'required|string',
        'photo.location' => 'required|string',
        'photo.camerabody' => 'required|string',
        'photo.image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'photo.cameralens' => 'nullable|string',
        'photo.camerasoft' => 'nullable|string',
        ], [
        'photo.name.required' => '※作品名は必須です。',
        'photo.location.required' => '※撮影場所は必須です。',
        'photo.camerabody.required' => '※カメラは必須です',
        'photo.image.required' => '※写真は必須です。',
   
        ]);

    $photo = new Photo;
    //dd($request);
    //dd($photo);
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

     return redirect()->route('photos.show', ['photo' => $photo->id]);
    //return redirect('/photos/' . $photo->id);
}
    
    public function delete(Photo $photo)
    {
        $photo->delete();
        return redirect('/photos/list');
    }
    
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        $photos = Photo::where('name','like','%'.$query. '%')
          ->orWhere('description', 'like', '%' . $query . '%')
          ->orWhere('location', 'like', '%' . $query . '%')
          ->orWhere('camerabody', 'like', '%' . $query . '%')
          ->orWhere('cameralens', 'like', '%' . $query . '%')
          ->orWhere('camerasoft', 'like', '%' . $query . '%')
          ->paginate(config('app.pagination_count', 10));
          
           return view('photos.search', compact('photos','query'));
    }
    
    public function like(Request $request)
{
    $user_id = Auth::user()->id; // ログインしているユーザーのidを取得
    $photo_id = $request->photo_id; // 投稿のidを取得

    // すでにいいねがされているか判定するためにlikesテーブルから1件取得
    $already_liked = Like::where('user_id', $user_id)->where('photo_id', $photo_id)->first(); 

    if (!$already_liked) { 
        $like = new Like; // Likeクラスのインスタンスを作成
        $like->photo_id = $photo_id;
        $like->user_id = $user_id;
        $like->save();
    } else {
        // 既にいいねしてたらdelete 
        Like::where('photo_id', $photo_id)->where('user_id', $user_id)->delete();
    }
    // 投稿のいいね数を取得
    $photo_likes_count = Photo::withCount('likes')->findOrFail($photo_id)->likes_count;
    $param = [
        'photo_likes_count' => $photo_likes_count,
    ];
    return response()->json($param); // JSONデータをjQueryに返す
}
    
}