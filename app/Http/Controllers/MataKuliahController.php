<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah;
use App\Models\Jurusan;

class MataKuliahController extends Controller
{
    // ================== READ ==================
    // Menampilkan semua data mata kuliah + relasi jurusan
    public function index(Request $request){
        $keyword = $request->keyword;

        $matakuliah = MataKuliah::with('jurusan')
            ->when($keyword, function($query) use ($keyword){
                $query->where('nama_matakuliah','like',"%$keyword%");
            })
            ->paginate(5);

        return view('matakuliah.index', compact('matakuliah','keyword'));
    }

    // ================== CREATE (FORM) ==================
    public function create(){
        $jurusan = Jurusan::all();
        return view('matakuliah.create', compact('jurusan'));
    }

    // ================== CREATE (PROSES) ==================
    public function store(Request $request){
        $request->validate([
            'nama_matakuliah' => 'required|string|max:100',
            'sks'             => 'required|integer|min:1|max:6',
            'id_jurusan'      => 'required|exists:tb_jurusan,id_jurusan',
        ]);

        MataKuliah::create($request->all());
        return redirect('/matakuliah')->with('success','Data berhasil ditambahkan');
    }

    // ================== UPDATE (FORM) ==================
    public function edit($id){
        $data = MataKuliah::findOrFail($id);
        $jurusan = Jurusan::all();
        return view('matakuliah.edit', compact('data','jurusan'));
    }

    // ================== UPDATE (PROSES) ==================
    public function update(Request $request, $id){
        $request->validate([
            'nama_matakuliah' => 'required|string|max:100',
            'sks'             => 'required|integer|min:1|max:6',
            'id_jurusan'      => 'required|exists:tb_jurusan,id_jurusan',
        ]);

        $data = MataKuliah::findOrFail($id);
        $data->update($request->all());

        return redirect('/matakuliah')->with('success','Data berhasil diupdate');
    }

    // ================== DELETE ==================
    public function destroy($id){
        MataKuliah::destroy($id);
        return redirect('/matakuliah')->with('success','Data berhasil dihapus');
    }

    // ================== EXPORT CSV ==================
    public function exportCsv()
    {
        $fileName = 'matakuliah.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        $callback = function () {

            $file = fopen('php://output', 'w');

            // BOM UTF-8 agar terbaca baik di Excel
            fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));

            // Header kolom
            fputcsv($file, [
                'ID',
                'Nama Mata Kuliah',
                'SKS',
                'Jurusan'
            ], ';');

            $matakuliah = MataKuliah::with('jurusan')->get();

            foreach ($matakuliah as $item) {
                fputcsv($file, [
                    $item->id_matakuliah,
                    $item->nama_matakuliah,
                    $item->sks,
                    $item->jurusan->nama_jurusan ?? '-',
                ], ';');
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    // ================== PRINT PDF ==================
    public function print()
    {
        $matakuliah = MataKuliah::with('jurusan')->get();

        return view('matakuliah.print', compact('matakuliah'));
    }

    // ================== EXPORT EXCEL ==================
    public function exportExcel()
    {
        $matakuliah = MataKuliah::with('jurusan')->get();

        return response()
            ->view('matakuliah.excel', compact('matakuliah'))
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', 'attachment; filename=matakuliah.xls');
    }
}
