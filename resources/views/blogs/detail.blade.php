<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $blog->judul }}</title>
    <link rel="stylesheet" href="/css/blog.css">
</head>
<body>
    <nav>
        <p>BLOG<span style="color: aqua">PASS</span></p>
        <ul>
            <li><a href="/blogs">List Blogs</a></li>
            <li><a href="/tambah">Create Blog</a></li>
        </ul>
    </nav>
    <a href="/tambah">Tambah Blog</a>
    <div class="blog-detail">
        @if($blog->image)
            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->judul }}" class="blog-image">
        @endif
        <h1>{{ $blog->judul }}</h1>
        <p>{{ $blog->isi }}</p>

        <div class="actions">
            <a href="/blogs/{{ $blog->id }}/edit" class="Edit">Edit Blog</a>
            <form action="/blogs/{{ $blog->id }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="Delete">Delete Blog</button>
            </form>
        </div>
    </div>
</body>
</html>
