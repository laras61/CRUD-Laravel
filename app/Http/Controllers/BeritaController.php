<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{



public function index()
    {
    	// mengambil data dari table
    	$berita = DB::table('berita')->get();

    	// mengirim data ke view
    	return view('VBerita',['berita' => $berita]);

    }

    public function tambah(Request $request)
    {
    	DB::table('berita')->insert([
			'nama_berita' => $request->nama_berita,

		]);
		// alihkan halaman ke halaman berita
		return redirect('/berita');

    }

    public function update(Request $request, $id)
    {
        DB::table('berita')->where('kd_berita', $id)->update([
            'nama_berita' => $request->nama_berita
        ]);
        // alihkan halaman ke halaman berita
        return redirect('/berita');
    }

    public function hapus($id)
    {
        $blog = DB::table('berita')->where('kd_berita',$id)->delete();

        return redirect('/berita');

    }

}
