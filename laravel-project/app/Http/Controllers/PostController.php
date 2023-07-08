<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\View\View;
//return type redirectResponse
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;




class PostController extends Controller
{

    public function index(): View
    {
        $posts = Post::latest()->paginate();

        return view('posts.index', compact('posts'));
    }

    public function show(string $id): View
{
    $post = Post::findOrFail($id);

    return view('posts.show', compact('post'));

}
public function create(): View
    {
        return view('posts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'namatokoh'     => 'required|min:5',
            'orientasi'   => 'required|min:10',
            'peristiwa'   => 'required|min:10',
            'riorientasi'   => 'required|min:10'
        ]);

        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        Post::create([
            'image'     => $image->hashName(),
            'namatokoh'     => $request->namatokoh,
            'orientasi'   => $request->orientasi,
            'peristiwa'   => $request->peristiwa,
            'riorientasi'   => $request->riorientasi
        ]);

        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //render view with post
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'namatokoh'     => 'required|min:5',
            'orientasi'   => 'required|min:10',
            'peristiwa'   => 'required|min:10',
            'riorientasi'   => 'required|min:10'
        ]);

        //get post by ID
        $post = Post::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            //delete old image
            Storage::delete('public/posts/'.$post->image);

            //update post with new image
            $post->update([
                'image'     => $image->hashName(),
                'namatokoh'     => $request->namatokoh,
                'orientasi'   => $request->orientasi,
                'peristiwa'   => $request->peristiwa,
                'riorientasi'   => $request->riorientasi
            ]);

        } else {

            //update post without image
            $post->update([
                'namatokoh'     => $request->namatokoh,
                'orientasi'   => $request->orientasi,
                'peristiwa'   => $request->peristiwa,
                'riorientasi'   => $request->riorientasi
            ]);
        }

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

}
