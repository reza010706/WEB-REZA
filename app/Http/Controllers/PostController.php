<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();


        return view('admin.posts.index', [
            'posts' => $posts,
            'title' => 'post',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', [
            'categories' => $categories,
            'title' => 'Buat post',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // simpan data post baru
        post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
            'status' => $request->status,
        ]);

        // Redirect ke halaman index post
        return redirect('/posts')->with('succes','Post berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // ambil semua data category
        $categories = Category::all();

        // Tampilan halaman edit dan kirim data post dan category
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categories,
            'title' => 'Edit Post',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // update data post
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'status' => $request->status,
        ]);

        // Redirect ke halaman index post
        return redirect('/posts')->with('success', 'post berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Hapus data post
        $post->delete();

        // redirect ke halaman index post
        return redirect('/posts')->with('success', 'Post berhasil dihapus');
    }
}