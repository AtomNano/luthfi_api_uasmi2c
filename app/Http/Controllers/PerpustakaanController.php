<?php

namespace App\Http\Controllers;

use App\Models\Perpustakaan;
use Illuminate\Http\Request;

class PerpustakaanController extends Controller
{
    // READ all data
    public function index()
    {
        $perpus = Perpustakaan::orderBy('id', 'desc')->get();
        return response()->json([
            'success' => true,
            'message' => 'Daftar semua data perpustakaan',
            'data' => $perpus
        ], 200);
    }

    // CREATE data
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
            'tipe' => 'required|in:Negeri,Swasta',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric'
        ]);

        $perpus = Perpustakaan::create($request->all());

        if ($perpus) {
            return response()->json([
                'success' => true,
                'message' => 'Data perpustakaan berhasil ditambahkan',
                'data' => $perpus
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Gagal menambahkan data'
        ], 400);
    }

    // READ by ID
    public function show($id)
    {
        $perpus = Perpustakaan::find($id);
        if ($perpus) {
            return response()->json([
                'success' => true,
                'message' => 'Detail data perpustakaan',
                'data' => $perpus
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data tidak ditemukan'
        ], 404);
    }

    // UPDATE data
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
            'tipe' => 'required|in:Negeri,Swasta',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric'
        ]);

        $perpus = Perpustakaan::find($id);
        if (!$perpus) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $perpus->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diupdate',
            'data' => $perpus
        ], 200);
    }

    // DELETE data
    public function destroy($id)
    {
        $perpus = Perpustakaan::find($id);

        if (!$perpus) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $perpus->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus'
        ], 200);
    }
}