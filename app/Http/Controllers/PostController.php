<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Menampilkan semua postingan ke pengunjung.
     */
    public function index()
    {
        $posts = Post::where('status', 'published')->latest()->paginate(9);
        return view('blog.index', compact('posts'));
    }

    /**
     * Menampilkan detail postingan.
     */
    public function show(Post $post)
    {
        $post->increment('views');
        $comments = $post->comments()->where('status', 'approved')->latest()->get();
        return view('blog.show', compact('post', 'comments'));
    }

    /**
     * Daftar post untuk admin.
     */
    public function adminIndex()
    {
        $posts = Post::latest()->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Form buat post baru (admin).
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Simpan post baru (admin).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'    => 'required|max:255',
            'location' => 'required',
            'body'     => 'required',
            'category' => 'nullable|string|max:80',
            'status'   => 'nullable|in:draft,published',
        ]);

        $validated['slug']    = Str::slug($request->title) . '-' . time();
        $validated['user_id'] = auth()->id();
        $validated['status']  = $request->status ?? 'published';

        Post::create($validated);

        return redirect()->route('admin.posts.index')
                         ->with('success', 'Postingan berhasil dibuat!');
    }

    /**
     * Form edit post (admin).
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update post (admin).
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title'    => 'required|max:255',
            'location' => 'required',
            'body'     => 'required',
            'category' => 'nullable|string|max:80',
            'status'   => 'nullable|in:draft,published',
        ]);

        $post->update($validated);

        return redirect()->route('admin.posts.index')
                         ->with('success', 'Postingan berhasil diperbarui!');
    }

    /**
     * Hapus post (admin).
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')
                         ->with('success', 'Postingan berhasil dihapus.');
    }
}
