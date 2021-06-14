<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Hash;
use App\Akomodasi;
use App\AkomodasiUser;
use App\Pembayaran;
use App\Sewa;
use App\User;
use DB;
use Illuminate\Http\Request;

class PenyediaController extends Controller
{

    public function __construct()
    {
        $this->middleware('penyedia');
    }

    public function index()
    {
        return view('penyedia.dashboard');
    }

    public function akomodasi()
    {
        $id = auth()->user()->id;

        $kos_ver = DB::table('akomodasis')->rightjoin('akomodasi_users', 'akomodasis.id_akomodasi', '=', 'akomodasi_users.id_akomodasi')
        ->where('id_user', $id)->where('jenis_akomodasi', 'kos')->where('status_akomodasi', 'ver')
        ->get();
        $kos_notver = DB::table('akomodasis')->rightjoin('akomodasi_users', 'akomodasis.id_akomodasi', '=', 'akomodasi_users.id_akomodasi')
        ->where('id_user', $id)->where('jenis_akomodasi', 'kos')->where('status_akomodasi', 'not_ver')
        ->get();

        $kontrakan_ver = DB::table('akomodasis')->rightjoin('akomodasi_users', 'akomodasis.id_akomodasi', '=', 'akomodasi_users.id_akomodasi')
        ->where('id_user', $id)->where('jenis_akomodasi', 'kontrakan')->where('status_akomodasi', 'ver')
        ->get();
        $kontrakan_notver = DB::table('akomodasis')->rightjoin('akomodasi_users', 'akomodasis.id_akomodasi', '=', 'akomodasi_users.id_akomodasi')
        ->where('id_user', $id)->where('jenis_akomodasi', 'kontrakan')->where('status_akomodasi', 'not_ver')
        ->get();

        $homestay_ver = DB::table('akomodasis')->rightjoin('akomodasi_users', 'akomodasis.id_akomodasi', '=', 'akomodasi_users.id_akomodasi')
        ->where('id_user', $id)->where('jenis_akomodasi', 'homestay')->where('status_akomodasi', 'ver')
        ->get();
        $homestay_notver = DB::table('akomodasis')->rightjoin('akomodasi_users', 'akomodasis.id_akomodasi', '=', 'akomodasi_users.id_akomodasi')
        ->where('id_user', $id)->where('jenis_akomodasi', 'homestay')->where('status_akomodasi', 'not_ver')
        ->get();




        return view('penyedia.akomodasi',compact('kos_ver', 'kos_notver', 'kontrakan_ver', 'kontrakan_notver', 'homestay_ver', 'homestay_notver'));
    }

    public function tambah()
    {
        return view('penyedia.akomodasi-tambah');
    }

    public function tambah_kos(Request $request)
    {
        // var_dump($request->fasilitas);
    
        $request -> validate([
            'nama_akomodasi' => 'required|min:8',
            'kecamatan' => 'required',
            'alamat' => 'required',
            'deskripsi_akomodasi' => 'required',
            'stok' => 'required',
            'fasilitas' => 'required',
            'ukuran' => 'required',
            'img' => 'required',
            'img.*' => 'image|mimes:jpeg,jpg,png|max:4096',
        ]);

        // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('img');
        $nama_file = time()."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'img/res/akomodasi/';
		$file->move($tujuan_upload,$nama_file);

        $akomodasi = Akomodasi::create([
            'nama_akomodasi' => $request->nama_akomodasi,
            'kecamatan' => $request->kecamatan,
            'alamat' => $request->alamat,
            'deskripsi_akomodasi' => $request->deskripsi_akomodasi,
            'harga_hari' => $request->harga_hari,
            'harga_bulan' => $request->harga_bulan,
            'stok' => $request->stok,
            'fasilitas' => $request->fasilitas,
            'ukuran' => $request->ukuran,
            'jenis_akomodasi' => $request->jenis_akomodasi,
            'status_akomodasi' => 'ver',
            'img_akomodasi' => $nama_file,
        ]);

        $akomodasiId =  $akomodasi->id;
        
        $userId = auth()->user()->id;

        AkomodasiUser::create([
            'id_akomodasi' => $akomodasiId,
            'id_user' => $userId,
        ]);

        return redirect('/penyedia/akomodasi')->with('success', 'Berhasil menambah Akomodasi');
    }

    // public function tambah_kontrakan(Request $request)
    // {
    //     $request -> validate([
    //         'nama_akomodasi' => 'required|min:8',
    //         'kecamatan' => 'required',
    //         'alamat' => 'required',
    //         'deskripsi_akomodasi' => 'required',
    //         'harga_hari' => 'required',
    //         'harga_bulan' => 'required',
    //         'stok' => 'required',
    //         'ukuran' => 'required',
    //         'img' => 'required',
    //         'img.*' => 'image|mimes:jpeg,jpg,png|max:4096',
    //     ]);

    //     // menyimpan data file yang diupload ke variabel $file
	// 	$file = $request->file('img');
    //     $nama_file = time()."_".$file->getClientOriginalName();
 
    //   	        // isi dengan nama folder tempat kemana file diupload
	// 	$tujuan_upload = 'img/res/akomodasi/';
	// 	$file->move($tujuan_upload,$nama_file);

    //     $akomodasi = Akomodasi::create([
    //         'nama_akomodasi' => $request->nama_akomodasi,
    //         'kecamatan' => $request->kecamatan,
    //         'alamat' => $request->alamat,
    //         'deskripsi_akomodasi' => $request->deskripsi_akomodasi,
    //         'harga_hari' => $request->harga_hari,
    //         'harga_bulan' => $request->harga_bulan,
    //         'stok' => $request->stok,
    //         'ukuran' => $request->ukuran,
    //         'jenis_akomodasi' => 'kontrakan',
    //         'status_akomodasi' => 'not_ver',
    //         'img_akomodasi' => $nama_file,
    //     ]);

    //     $akomodasiId =  $akomodasi->id;
        
    //     $userId = auth()->user()->id;

    //     AkomodasiUser::create([
    //         'id_akomodasi' => $akomodasiId,
    //         'id_user' => $userId,
    //     ]);

    //     return redirect('/penyedia/akomodasi')->with('success', 'Berhasil menambah kontrakan');
    // }

    // public function tambah_homestay(Request $request)
    // {
    //     $request -> validate([
    //         'nama_akomodasi' => 'required|min:8',
    //         'kecamatan' => 'required',
    //         'alamat' => 'required',
    //         'deskripsi_akomodasi' => 'required',
    //         'harga_hari' => 'required',
    //         'harga_bulan' => 'required',
    //         'stok' => 'required',
    //         'ukuran' => 'required',
    //         'img' => 'required',
    //         'img.*' => 'image|mimes:jpeg,jpg,png|max:4096',
    //     ]);

    //     // menyimpan data file yang diupload ke variabel $file
	// 	$file = $request->file('img');
    //     $nama_file = time()."_".$file->getClientOriginalName();
 
    //   	        // isi dengan nama folder tempat kemana file diupload
	// 	$tujuan_upload = 'img/res/akomodasi/';
	// 	$file->move($tujuan_upload,$nama_file);

    //     $akomodasi = Akomodasi::create([
    //         'nama_akomodasi' => $request->nama_akomodasi,
    //         'kecamatan' => $request->kecamatan,
    //         'alamat' => $request->alamat,
    //         'deskripsi_akomodasi' => $request->deskripsi_akomodasi,
    //         'harga_hari' => $request->harga_hari,
    //         'harga_bulan' => $request->harga_bulan,
    //         'stok' => $request->stok,
    //         'ukuran' => $request->ukuran,
    //         'jenis_akomodasi' => 'homestay',
    //         'status_akomodasi' => 'not_ver',
    //         'img_akomodasi' => $nama_file,
    //     ]);

    //     $akomodasiId =  $akomodasi->id;
        
    //     $userId = auth()->user()->id;

    //     AkomodasiUser::create([
    //         'id_akomodasi' => $akomodasiId,
    //         'id_user' => $userId,
    //     ]);

    //     return redirect('/penyedia/akomodasi')->with('success', 'Berhasil menambah homestay');
    // }

    
    public function akomodasi_edit($id)
    {
         
        $akomodasi = Akomodasi::where('id_akomodasi', $id)->first();
        // var_dump($akomodasi);
        return view('penyedia/akomodasi-edit', compact('akomodasi'));
    }

    public function akomodasi_update(Request $request, $id)
    {  
        Akomodasi::where('id_akomodasi', $id)->update([
            'nama_akomodasi' => $request->nama_akomodasi,
            'deskripsi_akomodasi' => $request->deskripsi_akomodasi,
            'harga_hari' => $request->harga_hari,
            'harga_bulan' => $request->harga_bulan,
            'stok' => $request->stok,
            'ukuran' => $request->ukuran,
        ]);
        return redirect('penyedia/akomodasi')->with('success', 'Berhasil mengedit akomodasi'); 
    }


    public function akomodasi_delete($id)
    {
        // echo 'test';
        DB::table('akomodasis')->where('id_akomodasi', $id)->delete();
        return back()->with('success', 'Berhasil menghapus');
    }

    public function pemesanan_ver()
    {
        $id = auth()->user()->id;

        $sewas = DB::table('sewas')
        ->rightjoin('sewa_akomodasis', 'sewas.id_sewa', '=', 'sewa_akomodasis.id_sewa')
        ->rightjoin('akomodasis', 'sewa_akomodasis.id_akomodasi', '=', 'akomodasis.id_akomodasi')
        ->rightjoin('akomodasi_users', 'akomodasis.id_akomodasi', '=', 'akomodasi_users.id_akomodasi')
        ->rightjoin('sewa_users', 'sewas.id_sewa', '=', 'sewa_users.id_sewa')
        ->rightjoin('users', 'sewa_users.id_user', '=', 'users.id')
        ->where('akomodasi_users.id_user', $id)
        ->where('sewas.status_sewa', 'ver')
        ->paginate(1);

        return view('penyedia.pemesanan-ver',compact('sewas'));
    }
    public function pemesanan_notver()
    {
        $id = auth()->user()->id;

        $sewas = DB::table('sewas')
        ->rightjoin('sewa_akomodasis', 'sewas.id_sewa', '=', 'sewa_akomodasis.id_sewa')
        ->rightjoin('akomodasis', 'sewa_akomodasis.id_akomodasi', '=', 'akomodasis.id_akomodasi')
        ->rightjoin('akomodasi_users', 'akomodasis.id_akomodasi', '=', 'akomodasi_users.id_akomodasi')
        ->rightjoin('sewa_users', 'sewas.id_sewa', '=', 'sewa_users.id_sewa')
        ->rightjoin('users', 'sewa_users.id_user', '=', 'users.id')
        ->where('akomodasi_users.id_user', $id)
        ->where('sewas.status_sewa', 'not_ver')
        ->paginate(1);

        return view('penyedia.pemesanan-not-ver',compact('sewas'));
    }

    public function pemesanan_terima($id)
    {
        // echo 'test';
        Sewa::where('id_sewa', $id)->update([
            'status_sewa' => 'ver',
        ]);
        return redirect('penyedia/pemesanan/ver')->with('success', 'Berhasil konfirmasi penyewaan'); 
    }

    public function pemesanan_batalkan($id)
    {
        // echo 'test';
        DB::table('sewas')->where('id_sewa', $id)->delete();
        return back()->with('success', 'Berhasil menghapus');
    }

    public function pembayaran_diproses()
    {
        $id_user = auth()->user()->id;
        // echo $id_user;

        $pembayarans = Pembayaran::join('sewa_akomodasis', 'pembayarans.id_sewa', '=', 'sewa_akomodasis.id_sewa')
        ->join('sewas', 'sewa_akomodasis.id_sewa', '=', 'sewas.id_sewa')
        ->join('akomodasis', 'sewa_akomodasis.id_akomodasi', '=', 'akomodasis.id_akomodasi')
        ->where('id_penyedia', $id_user)
        ->where('status_pembayaran', 'diproses')
        ->paginate(1);

        return view('penyedia.pembayaran', compact('pembayarans'));
    }
    public function pembayaran_diterima()
    {
        $id_user = auth()->user()->id;
        // echo $id_user;

        $pembayarans = Pembayaran::join('sewa_akomodasis', 'pembayarans.id_sewa', '=', 'sewa_akomodasis.id_sewa')
        ->join('sewas', 'sewa_akomodasis.id_sewa', '=', 'sewas.id_sewa')
        ->join('akomodasis', 'sewa_akomodasis.id_akomodasi', '=', 'akomodasis.id_akomodasi')
        ->where('id_penyedia', $id_user)
        ->where('status_pembayaran', 'ver')
        ->paginate(1);

        return view('penyedia.pembayaran-diterima', compact('pembayarans'));
    }

    public function pembayaran_konfirmasi($id)
    {
        Pembayaran::where('id_pembayaran', $id)->update([
            'status_pembayaran' => 'ver',
        ]);
        return redirect('penyedia/pembayaran/diterima')->with('success', 'Berhasil menerima pembayaran');
    }
    public function pembayaran_detail($id)
    {
        $id_user = auth()->user()->id;

        $pembayaran = Pembayaran::join('sewa_akomodasis', 'pembayarans.id_sewa', '=', 'sewa_akomodasis.id_sewa')
        ->join('sewas', 'sewa_akomodasis.id_sewa', '=', 'sewas.id_sewa')
        ->join('akomodasis', 'sewa_akomodasis.id_akomodasi', '=', 'akomodasis.id_akomodasi')
        ->where('id_penyedia', $id_user)
        ->where('id_pembayaran', $id)
        ->first();
        
        return view('penyedia/pembayaran-detail', compact('pembayaran'));
    }

    public function pengaturan()
    {
        return view('penyedia.pengaturan');
    }

    public function pengaturan_edit_profile($id)
    {
        $user = User::where('id', $id)->first();
        return view('penyedia/pengaturan-edit', compact('user'));
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
        return redirect('penyedia/pengaturan/')->with('success', 'Berhasil mengubah profile');
    }
    public function pengaturan_update_password(Request $request, $id)
    {
        User::where('id', $id)->update([
            'password' => Hash::make($request->password),
        ]);
        return redirect('penyedia/pengaturan')->with('success', 'Berhasil mengganti password');
    }

}
