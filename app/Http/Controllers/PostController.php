<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest as FormRequest;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])
            ->only([
                'store',
                'destroy'
            ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->with(['user', 'likes'])->paginate();
        return view('posts.index' ,compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormRequest $request)
    {
//        $post = Post::create([
//            'user_id' => auth()->id(),
//            'body' => $request->body
//        ]);

        //alternative selain di atas
//        $request->user()->posts()->create([
//            'body' => $request->body
//        ]);

        $request->user()->posts()->create($request->only('body'));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact(
            'post'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
//        sudah di alihkan menggunakan postpolicy
//        if(!$post->ownedBy(auth()->user())){
//            dd('no');
//        }
//        dd($post);

//        menggunakan postpolicy
        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }
}
