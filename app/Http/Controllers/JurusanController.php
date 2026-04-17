<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    // ================== READ ==================
    // Menampilkan semua data jurusan
    public function index(Request $request){
        $keyword = $request->keyword;

        $jurusan = Jurusan::when($keyword, function($query) use ($keyword){
            $query->where('nama_jurusan','like',"%$keyword%")
                  ->orWhere('akreditasi','like',"%$keyword%");
        })->paginate(5);

        return view('jurusan.index', compact('jurusan','keyword'));
    }

    // ================== CREATE (FORM) ==================
    public function create(){
        return view('jurusan.create');
    }

    // ================== CREATE (PROSES) ==================
    public function store(Request $request){
        $request->validate([
            'nama_jurusan' => 'required|string|max:100',
            'akreditasi'   => 'required|string|max:5',
        ]);

        Jurusan::create($request->all());
        return redirect('/jurusan')->with('success','Data berhasil ditambahkan');
    }

    // ================== UPDATE (FORM) ==================
    public function edit($id){
        $data = Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('data'));
    }

    // ================== UPDATE (PROSES) ==================
    public function update(Request $request, $id){
        $request->validate([
            'nama_jurusan' => 'required|string|max:100',
            'akreditasi'   => 'required|string|max:5',
        ]);

        $data = Jurusan::findOrFail($id);
        $data->update($request->all());

        return redirect('/jurusan')->with('success','Data berhasil diupdate');
    }

    // ================== DELETE ==================
    public function destroy($id){
        Jurusan::destroy($id);
        return redirect('/jurusan')->with('success','Data berhasil dihapus');
    }
}