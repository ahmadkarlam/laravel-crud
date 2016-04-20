<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Post\CreateFormRequest;
use App\Http\Requests\Post\UpdateFormRequest;
use App\Http\Requests;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(25);

        return view('post.index', compact('posts'));
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
    public function store(CreateFormRequest $request)
    {
        $image = $request->file('image');
        $destination = 'uploads/post/';
        $filename = sha1(time() . $image->getClientOriginalName()) .
                    '.' .
                    $image->getClientOriginalExtension();
        $image->move($destination, $filename);

        Post::create([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'image' => $filename,
        ]);

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormRequest $request, $id)
    {
        $post = Post::find($id);

        $filename = $post->image;
        if ($request->hasFile('image')) {
            unlink('uploads/post/' . $filename);

            $image = $request->file('image');
            $destination = 'uploads/post/';
            $filename = sha1(time() . $image->getClientOriginalName()) .
                        '.' .
                        $image->getClientOriginalExtension();
            $image->move($destination, $filename);
        }

        $post->update([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'image' => $filename,
        ]);

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        unlink('uploads/post/' . $post->image);
        $post->delete();

        return redirect()->route('post.index');
    }
}
