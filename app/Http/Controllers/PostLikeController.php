<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
Use App\Mail\PostLiked;

class PostLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function like(Post $post, Request $request)
    {
        //dd($post);
        //dd($post->likedBy($request->user()));

        //dd($post->likes()->withTrashed()->get());

        //kalau sudah like tidak bisa like lagi
        if($post->likedBy($request->user())){
            return response(null, 409);
        }

        $post->likes()->create([
            'user_id' => $request->user()->id
        ]);

        //kirim email ketika seseorang melike status kita
        //kirim email jika status org yang like tidak ter trigger softdelete
        if(!$post->likes()->onlyTrashed()->where('user_id', $request->user()->id)->count()){
            Mail::to($post->user)->send(new PostLiked(auth()->user(), $post));
        }

        return back();
    }

    public function unlike(Post $post, Request $request)
    {
        //dd('unlke');
        //dd($post);
//        dd($request->user()->likes()->where('post_id', $post->id));
//        $request->user()->likes()->where('post_id', $post->id)->delete();
        $post->likes()->where('user_id', $request->user()->id)->delete();
        return back();
    }
}
