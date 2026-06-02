<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BeritaController extends Controller {
    public function index() {
        $path = storage_path('berita.json');
        $beritas = File::exists($path) ? json_decode(File::get($path), true) : [];
        return view('berita', ['beritas' => $beritas]);
    }

    public function store(Request $request) {
        $path = storage_path('berita.json');
        $beritas = File::exists($path) ? json_decode(File::get($path), true) : [];
        
        $namaGambar = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('uploads'), $namaGambar);

        $beritas[] = [
            'id' => time(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $namaGambar,
            'tanggal' => date('d-m-Y')
        ];

        File::put($path, json_encode($beritas));
        return back();
    }
}