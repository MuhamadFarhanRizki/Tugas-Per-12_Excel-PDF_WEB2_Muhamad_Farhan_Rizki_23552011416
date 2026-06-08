<!DOCTYPE html>
<html>
<head>
    <title>Data Jurusan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- SWEETALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        h2 {
            color: #1b4332;
            font-weight: bold;
            background: #b7efc5;
            padding: 10px;
            border-radius: 10px;
            display: inline-block;
        }
        .table {
            background: #f1faee;
            border: 2px solid #2d6a4f;
        }
        .table thead {
            background: #74c69d;
            color: white;
        }
        .table th, .table td {
            border: 2px solid #2d6a4f !important;
            text-align: center;
        }
        .table tbody tr {
            background: #d8f3dc;
        }
        .table tbody tr:hover {
            background: #b7efc5;
        }
        .btn-warning {
            background-color: #ffb703;
            border: none;
        }
        .btn-danger {
            background-color: #e63946;
            border: none;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
        .btn-success {
            background-color: #40916c;
            border: none;
        }
        .aksi-btn {
            display: flex;
            gap: 5px;
            justify-content: center;
        }
    </style>
</head>

<body style="background: linear-gradient(to right, #d4fc79, #96e6a1);">

<div class="container mt-5">

    <h2 class="text-center mb-4">Data Jurusan</h2>

    <div class="mb-3 text-center">
        <a href="/dashboard" class="btn btn-secondary">Kembali</a>
        <a href="{{ route('jurusan.create') }}" class="btn btn-success">Tambah</a>
    </div>

    <!-- SEARCH -->
    <form method="GET" action="/jurusan" class="mb-3 text-center">
        <input type="text"
               name="keyword"
               value="{{ $keyword ?? '' }}"
               placeholder="Cari jurusan..."
               class="form-control w-50 d-inline">

        <button class="btn btn-primary">
            Cari
        </button>
    </form>

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Jurusan</th>
                <th>Akreditasi</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
        @foreach($jurusan as $index => $j)
            <tr>
                <td>
                    {{ ($jurusan->currentPage() - 1) * $jurusan->perPage() + $index + 1 }}
                </td>

                <td>{{ $j->nama_jurusan }}</td>

                <td>{{ $j->akreditasi }}</td>

                <td>
                    <div class="aksi-btn">

                        <a href="{{ route('jurusan.edit',$j->id_jurusan) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('jurusan.destroy',$j->id_jurusan) }}"
                              method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="button"
                                    class="btn btn-danger btn-sm"
                                    onclick="confirmDelete(this)">
                                Hapus
                            </button>
                        </form>

                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- EXPORT PDF -->
    <div class="text-center mb-2">
        <a href="{{ route('jurusan.print') }}" target="_blank" class="btn btn-danger">
            Export PDF
        </a>
    </div>

    <!-- EXPORT EXCEL -->
    <div class="text-center mb-3">
        <a href="{{ url('/jurusan/export-csv') }}" target="_blank" class="btn btn-success">
            Export Excel
        </a>
    </div>

    <!-- PAGINATION -->
    <div class="d-flex justify-content-center">
        {{ $jurusan->links() }}
    </div>

</div>

<script>
function confirmDelete(button) {
    Swal.fire({
        title: 'Yakin?',
        text: 'Data akan dihapus permanen!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e63946',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            button.closest('form').submit();
        }
    });
}
</script>

</body>
</html>