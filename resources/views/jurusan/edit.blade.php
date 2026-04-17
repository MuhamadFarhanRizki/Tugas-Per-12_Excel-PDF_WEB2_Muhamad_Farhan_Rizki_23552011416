<!DOCTYPE html>
<html>
<head>
    <title>Edit Jurusan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <h2>Edit Jurusan</h2>

    <form action="{{ route('jurusan.update',$data->id_jurusan) }}" method="POST">
        @csrf
        @method('PUT')

        <input class="form-control mb-2" type="text" name="nama_jurusan" value="{{ $data->nama_jurusan }}">
        <input class="form-control mb-2" type="text" name="akreditasi" value="{{ $data->akreditasi }}">

        <button class="btn btn-primary">Update</button>
    </form>
</div>

</body>
</html>