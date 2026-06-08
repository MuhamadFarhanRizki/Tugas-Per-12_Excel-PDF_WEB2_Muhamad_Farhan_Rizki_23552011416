<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;

class JurusanApi extends Controller
{
    // GET ALL DATA
    public function index()
    {
        $jurusan = Jurusan::with('matakuliah')->get();

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Data jurusan berhasil diambil',
            'result' => $jurusan
        ], 200);
    }

    // GET DATA BY ID
    public function show($id)
    {
        $jurusan = Jurusan::with('matakuliah')->find($id);

        if (!$jurusan) {
            return response()->json([
                'status' => 404,
                'success' => false,
                'message' => 'Data jurusan tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Detail data jurusan',
            'result' => $jurusan
        ], 200);
    }

    // TAMBAH DATA
    public function store(Request $request)
    {
        $jurusan = Jurusan::create($request->all());

        return response()->json([
            'status' => 201,
            'success' => true,
            'message' => 'Data jurusan berhasil ditambahkan',
            'result' => $jurusan
        ], 201);
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $jurusan = Jurusan::find($id);

        if (!$jurusan) {
            return response()->json([
                'status' => 404,
                'success' => false,
                'message' => 'Data jurusan tidak ditemukan'
            ], 404);
        }

        $jurusan->update($request->all());

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Data jurusan berhasil diupdate',
            'result' => $jurusan
        ], 200);
    }

    // DELETE DATA
    public function destroy($id)
    {
        $jurusan = Jurusan::find($id);

        if (!$jurusan) {
            return response()->json([
                'status' => 404,
                'success' => false,
                'message' => 'Data jurusan tidak ditemukan'
            ], 404);
        }

        $jurusan->delete();

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Data jurusan berhasil dihapus'
        ], 200);
    }
}