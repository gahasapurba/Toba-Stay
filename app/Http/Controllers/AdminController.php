<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Akomodasi;
use App\User;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function akomodasi()
    {
        $akomodasis = DB::table('akomodasis')->rightjoin('akomodasi_users', 'akomodasis.id_akomodasi', '=', 'akomodasi_users.id_akomodasi')
        ->where('status_akomodasi', 'not_ver')
        ->paginate(4);
        return view('admin.akomodasi', compact('akomodasis'));
    }

    public function verifikasi_akomodasi($id)
    {  
        Akomodasi::where('id_akomodasi', $id)->update([
            'status_akomodasi' => 'ver'
        ]);
        
        return redirect('admin/akomodasi')->with('success', 'Berhasil memverifikasi akomodasi');
    }
    public function verifikasi_notakomodasi($id)
    {  
        DB::table('akomodasis')->where('id_akomodasi', $id)->delete();
        return back()->with('success', 'Berhasil menolak akomodasi');
    }

    public function akun()
    {
        $akuns_ver = User::whereRaw('(role = "penyewa" OR role = "penyedia") AND (status_user = "ver")')
        ->get();

        $akuns_notver = User::where('status_user', 'not_ver')
        ->get();
        return view('admin.akun', compact('akuns_ver', 'akuns_notver'));
    }
    public function akun_detail($id)
    {
        $detail = User::where('id', $id)->first();
        return view('admin.akun-detail', compact('detail'));
    }
    public function akun_verifikasi($id)
    {

        User::where('id', $id)->update([
            'status_user' => 'ver',
        ]);
       
        return back()->with('success', 'Berhasil memverifikasi akun');
    }
    public function akun_delete($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return back()->with('success', 'Berhasil menghapus');
    }

    public function testimoni()
    {
        return view('admin.testimoni');
    }

    public function pengaturan()
    {
        return view('admin.pengaturan');
    }
    public function pengaturan_edit_profile($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin/pengaturan-edit', compact('user'));
    }
    public function pengaturan_update_profile(Request $request, $id)
    {
        $file = $request->file('img');
        $nama_file = time()."_".$file->getClientOriginalName();
 
		$tujuan_upload = 'img/res/users/';
		$file->move($tujuan_upload,$nama_file);

        User::where('id', $id)->update([
            'nama_user' => $request->nama_user,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'gender' => $request->gender,
            'img_user' => $nama_file,
        ]);
        return redirect('admin/pengaturan/')->with('success', 'Berhasil mengubah profile');
    }
    public function pengaturan_update_password(Request $request, $id)
    {
        User::where('id', $id)->update([
            'password' => Hash::make($request->password),
        ]);
        return redirect('admin/pengaturan')->with('success', 'Berhasil mengganti password');
    }

    public function pusatbantuan()
    {
        
        return view('admin.pusat-bantuan');
    }
    public function pusatbantuan_tambah()
    {
        
        return view('admin.pusat-bantuan-tambah');
    }
}
