<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
    	// mengambil data dari table
    	$profile = DB::table('profile')->get();

    	// mengirim data ke view
    	return view('Vprofile',['profile' => $profile]);

    }

    public function tambah(Request $request)
    {
    	DB::table('profile')->insert([
			'nama_profile' => $request->nama_profile,
		]);
		// alihkan halaman ke halaman profile
		return redirect('/profile');

    }

    public function hapus($id)
    {
        $blog = DB::table('profile')->where('kd_profile',$id)->delete();

        return redirect('/profile');

    }

    public function update(Request $request, $id)
    {
        DB::table('profile')->where('kd_profile', $id)->update([
            'nama_profile' => $request->nama_profile
        ]);
        // alihkan halaman ke halaman profile
        return redirect('/profile');
    }
}
