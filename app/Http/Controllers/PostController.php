<?php

namespace App\Http\Controllers;

use Storage;
use App\Post;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index', ['posts' => Post::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $user = Auth::user();
        $input['user_id'] = $user->id;

        if($file = $request->file('photo')) {
            $name = $file->getClientOriginalName();
            $photo = Photo::create(
                ['file' => $name]
            );
            //檢查檔案type 記錄使用者操作時的log json
            Storage::put(
                'public/photo/'.$photo->id.'.jpg',
                file_get_contents($request->file('photo')->getRealPath())
            );
            $input['photo_id'] = $photo->id;
        }

        Post::create($input);
        return redirect('/post');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        var_dump($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('post.edit', ['posts' => Post::find($post->id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $input = $request->only(['title', 'body']);
        Post::where('id', $post->id)->update($input);
        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        Post::destroy($post->id);
        return redirect('/post');
    }
}
