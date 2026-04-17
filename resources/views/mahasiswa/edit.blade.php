<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Edit Mahasiswa</h2>
    <form action="{{ route('mahasiswa.update',$data->id_mahasiswa) }}" method="POST">
        @csrf
        @method('PUT')
        <input class="form-control mb-2" type="text" name="nim" value="{{ $data->nim }}">
        <input class="form-control mb-2" type="text" name="nama" value="{{ $data->nama }}">
        <input class="form-control mb-2" type="email" name="email" value="{{ $data->email }}">
        <select class="form-control mb-2" name="id_jurusan">
            <option value="">-- Pilih Jurusan --</option>
            @foreach($jurusan as $j)
                <option value="{{ $j->id_jurusan }}" {{ $data->id_jurusan == $j->id_jurusan ? 'selected' : '' }}>
                    {{ $j->nama_jurusan }}
                </option>
            @endforeach
        </select>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>