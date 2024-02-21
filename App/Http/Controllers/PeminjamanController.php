<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Peminjaman;
use App\Models\Barang; // Added the missing "use" statement
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjamans= Peminjaman::latest()->paginate(5);

        return view('peminjaman.index', compact('peminjamans'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $siswa = Siswa::all();
        $barang = Barang::all(); // Corrected the capitalization
        return view('peminjaman.create', compact('siswa','barang'));
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        // validate form
        $this->validate($request, [
            'id_siswa' => 'required',
            'id_barang' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
        ]);

        Peminjaman::Create([
            'id_siswa' => $request->input('id_siswa'),
            'id_barang' => $request->input('id_barang'),
            'tgl_pinjam' => $request->input('tgl_pinjam'),
            'tgl_kembali' => $request->input('tgl_kembali'),
        ]);

        // redirect to index
        return redirect()->route('peminjaman.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * edit
     *
     * @param  mixed $peminjaman
     * @return void
     */
    public function edit(Peminjaman $peminjaman)
    {
        $siswa = Siswa::all();
        $barang = Barang::all();
        return view('peminjaman.edit', compact('peminjaman', 'siswa', 'barang'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $peminjaman
     * @return void
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        // validate form
        $this->validate($request, [
            'id_siswa' => 'required',
            'id_barang' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
        ]);

        $peminjaman->update([
            'id_siswa' => $request->input('id_siswa'),
            'id_barang' => $request->input('id_barang'),
            'tgl_pinjam' => $request->input('tgl_pinjam'),
            'tgl_kembali' => $request->input('tgl_kembali'),
        ]);

        // redirect to index
        return redirect()->route('peminjaman.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        // redirect to index
        return redirect()->route('peminjaman.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
