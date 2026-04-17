<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Tambah Mata Kuliah</h2>
    <form action="{{ route('matakuliah.store') }}" method="POST">
        @csrf
        <input class="form-control mb-2" type="text" name="nama_matakuliah" placeholder="Nama Mata Kuliah">
        <input class="form-control mb-2" type="number" name="sks" placeholder="SKS">
        <select class="form-control mb-2" name="id_jurusan">
            <option value="">-- Pilih Jurusan --</option>
            @foreach($jurusan as $j)
                <option value="{{ $j->id_jurusan }}">{{ $j->nama_jurusan }}</option>
            @endforeach
        </select>
        <button class="btn btn-success">Simpan</button>
    </form>
</div>
</body>
</html>