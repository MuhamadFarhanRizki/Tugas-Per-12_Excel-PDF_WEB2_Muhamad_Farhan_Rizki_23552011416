<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Jurusan;

class MahasiswaController extends Controller
{
    // ================== READ ==================
    // Menampilkan semua data mahasiswa + relasi jurusan
    public function index(Request $request){
        $keyword = $request->keyword;

        $mahasiswa = Mahasiswa::with('detail_jurusan')
            ->when($keyword, function($query) use ($keyword){
                $query->where('nim','like',"%$keyword%")
                      ->orWhere('nama','like',"%$keyword%")
                      ->orWhere('email','like',"%$keyword%");
            })
            ->paginate(5);

        return view('mahasiswa.index', compact('mahasiswa','keyword'));
    }

    // ================== CREATE (FORM) ==================
    public function create(){
        $jurusan = Jurusan::all();
        return view('mahasiswa.create', compact('jurusan'));
    }

    // ================== CREATE (PROSES) ==================
    public function store(Request $request){
        $request->validate([
            'nim'        => 'required|string|max:20|unique:tb_mahasiswa,nim',
            'nama'       => 'required|string|max:100',
            'email'      => 'required|email|unique:tb_mahasiswa,email',
            'id_jurusan' => 'required|exists:tb_jurusan,id_jurusan',
        ]);

        Mahasiswa::create($request->all());
        return redirect('/mahasiswa')->with('success','Data berhasil ditambahkan');
    }

    // ================== UPDATE (FORM) ==================
    public function edit($id){
        $data = Mahasiswa::findOrFail($id);
        $jurusan = Jurusan::all();
        return view('mahasiswa.edit', compact('data','jurusan'));
    }

    // ================== UPDATE (PROSES) ==================
    public function update(Request $request, $id){
        $request->validate([
            'nim'        => 'required|string|max:20|unique:tb_mahasiswa,nim,'.$id.',id_mahasiswa',
            'nama'       => 'required|string|max:100',
            'email'      => 'required|email|unique:tb_mahasiswa,email,'.$id.',id_mahasiswa',
            'id_jurusan' => 'required|exists:tb_jurusan,id_jurusan',
        ]);

        $data = Mahasiswa::findOrFail($id);
        $data->update($request->all());

        return redirect('/mahasiswa')->with('success','Data berhasil diupdate');
    }

    // ================== DELETE ==================
    public function destroy($id){
        Mahasiswa::destroy($id);
        return redirect('/mahasiswa')->with('success','Data berhasil dihapus');
    }
// ================== EXPORT CSV ==================
    public function exportCsv()
    {
        $fileName = 'mahasiswa.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        $callback = function () {

            $file = fopen('php://output', 'w');

            // Tambahkan BOM agar UTF-8 terbaca baik di Excel
            fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));

            // Header kolom
            fputcsv($file, [
                'ID',
                'NIM',
                'Nama',
                'Jurusan'
            ], ';');

            $mahasiswa = Mahasiswa::with('detail_jurusan')->get();

            foreach ($mahasiswa as $item) {
                fputcsv($file, [
                    $item->id_mahasiswa,
                    $item->nim,
                    $item->nama,
                    $item->detail_jurusan->nama_jurusan ?? '-',
                ], ';');
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

        // ================== PRINT PDF ==================
    public function print()
    {
        $mahasiswa = Mahasiswa::with('detail_jurusan')->get();

        return view('mahasiswa.print', compact('mahasiswa'));
    }

    // ================== EXPORT EXCEL ==================
    public function exportExcel()
    {
        $mahasiswa = Mahasiswa::with('detail_jurusan')->get();

        return response()
            ->view('mahasiswa.excel', compact('mahasiswa'))
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', 'attachment; filename=mahasiswa.xls');
    }
}

