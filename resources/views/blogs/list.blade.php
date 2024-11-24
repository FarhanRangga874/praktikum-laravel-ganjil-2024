<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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

    <div class="blogs-container">
        @foreach($blogs as $blog)
        <div class="blog-container">
            <a href="/blogs/{{ $blog->id }}" class="blog-link">
                @if($blog["image"]) 
                    <img src="{{ asset('storage/' . $blog['image']) }}" alt="{{ $blog['judul'] }}" class="blog-image">
                @endif
                <h1 class="blog-title">{{ $blog["judul"] }}</h1>
                <p class="blog-content">{{ Str::limit($blog["isi"], 100) }}</p>
            </a>
        </div>
        @endforeach
    </div>
</body>
</html>
