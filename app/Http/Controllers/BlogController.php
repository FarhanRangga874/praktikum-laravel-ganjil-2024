<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    // Menampilkan daftar blog
    public function showBlogs()
    {
        $blogs = Blog::all();
        return view("blogs/list", compact("blogs"));
    }

    // Form tambah blog
    public function tambahBlog() 
    {
        return view('blogs/create');
    }

    // Menyimpan blog baru
    public function createBlog(Request $request) 
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);
    
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Simpan gambar ke storage/public/images
        }
    
        Blog::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'image' => $imagePath, // Simpan path gambar di database
        ]);
    
        return redirect("/blogs")->with('success', 'Blog berhasil ditambahkan!');
    }

    // Menampilkan detail blog
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs/detail', compact('blog'));
    }

    // Form edit blog
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs/edit', compact('blog'));
    }

    // Menyimpan perubahan blog
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        $blog = Blog::findOrFail($id);

        $imagePath = $blog->image; // Path gambar lama
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($imagePath) {
                Storage::delete('public/' . $imagePath);
            }
            $imagePath = $request->file('image')->store('images', 'public'); // Simpan gambar baru
        }

        $blog->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'image' => $imagePath, // Simpan path gambar baru
        ]);

        return redirect("/blogs/{$id}")->with('success', 'Blog berhasil diperbarui!');
    }

    // Menghapus blog
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->image) {
            Storage::delete('public/' . $blog->image); // Hapus file gambar
        }

        $blog->delete();
        return redirect('/blogs')->with('success', 'Blog berhasil dihapus!');
    }
}
