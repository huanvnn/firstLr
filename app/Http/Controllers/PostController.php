<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Post::create($request->all());
        $user_id=Auth::user()->id;
        $new_post=Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'tag'=>$request->tag,
            'user_id'=>$user_id
        ]);
        if ($new_post) {
            $red=redirect('/admin/posts')->with('success','Data  has been added');
        }else{
            $red=redirect('/admin/posts/create')->with('danger','Input fail');
        }
        return $red;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts=Post::findOrFail($id);
        return view('admin.posts.edit',compact('posts'));
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
        $post=Post::findOrFail($id);
        $post->update([
            'title'=>$request->title,
            'content'=>$request->content,
            'tag'=>$request->tag
        ]);
        if ($post) {
            $red =redirect('/admin/posts')->with('success',"Just edit $post->title");
        }else{
            $red = redirect('/admin/posts/$id/edit')->with('danger', 'Update fail');
        }
        return $red;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findOrFail($id);
        $title=$post->title;
        $post->forceDelete();
        $red =redirect('/admin/posts')->with('success', "$title has been deletetd");
        return $red;
    }
}
