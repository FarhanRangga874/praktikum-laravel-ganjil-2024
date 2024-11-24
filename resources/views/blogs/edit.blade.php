<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>
    <link rel="stylesheet" href="\css\edit.css">
</head>
<body>
    <div class="blog-detail">
        <h1>Edit Blog: {{ $blog->judul }}</h1>

        <form action="/blogs/{{ $blog->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="judul">
                <label for="judul">Judul:</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul', $blog->judul) }}" required>
            </div>

            <div class="isi">
                <label for="isi">Isi:</label>
                <textarea name="isi" id="isi" rows="5" required>{{ old('isi', $blog->isi) }}</textarea>
            </div>

            <div class="image">
                <label for="image">Gambar (Optional):</label>
                <input type="file" name="image" id="image" accept="image/*">
                <small>Hanya file gambar yang diperbolehkan (JPEG, PNG, JPG, GIF).</small>
                
                @if($blog->image)
                    <div class="current-image">
                        <p style="color: white">Gambar saat ini:</p>
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->judul }}" style="max-width: 200px;">
                    </div>
                @endif
            </div>

            <div class="submit">
                <button type="submit">Update Blog</button>
            </div>
        </form>

        <div class="actions">
            <form action="/blogs/{{ $blog->id }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn_delete">Delete Blog</button>
            </form>
        </div>
    </div>
</body>
</html>
