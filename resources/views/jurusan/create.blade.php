<!DOCTYPE html>
<html>
<head>
    <title>Tambah Jurusan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <h2>Tambah Jurusan</h2>

    <form action="{{ route('jurusan.store') }}" method="POST">
        @csrf

        <input class="form-control mb-2" type="text" name="nama_jurusan" placeholder="Nama Jurusan">
        <input class="form-control mb-2" type="text" name="akreditasi" placeholder="Akreditasi">

        <button class="btn btn-success">Simpan</button>
    </form>
</div>

</body>
</html>