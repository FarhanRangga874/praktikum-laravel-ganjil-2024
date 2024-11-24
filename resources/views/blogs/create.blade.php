
<link rel="stylesheet" href="\css\create.css">
<h1>Tambah Blog</h1>
<form action="/tambah" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="judul">Judul</label>
        <input type="text" name="judul" id="judul" required>
    </div>
    <div>
        <label for="isi">Isi</label>
        <textarea name="isi" id="isi" required></textarea>
    </div>
    <div>
        <label for="image">Gambar</label>
        <input type="file" name="image" id="image" accept="image/*">
    </div>
    <div>
        <button type="submit">Tambah</button>
    </div>
</form>
