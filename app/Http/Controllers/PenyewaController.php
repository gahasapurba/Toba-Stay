<?php

namespace App\Http\Controllers;

USE Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Akomodasi;
use App\Pembayaran;
use App\SewaAkomodasi;
use App\SewaUser;
use App\Sewa;
use App\User;
use DB;
use Illuminate\Http\Request;

class PenyewaController extends Controller
{

    public function __construct()
    {
        $this->middleware('penyewa');
    }


    public function index()
    {
        return view('penyewa.dashboard');
    }

    public function sewa(Request $request)
    {
        $id_akomodasi = $request->id;
        $durasi = $request->durasi;
        $tanggal = $request->date;
        $tanggal_masuk = Carbon::parse($tanggal)->subDays(1)->format('d-m-Y');
        $tanggal_keluar = Carbon::parse($tanggal_masuk)->addMonth($durasi)->format('d-m-Y');
        
        $akomodasi = Akomodasi::where('id_akomodasi', $id_akomodasi)->first();
        return view('penyewa.sewa', ['akomodasi'=>$akomodasi, 'tanggal_masuk'=>$tanggal_masuk, 'durasi'=>$durasi, 'tanggal_keluar'=>$tanggal_keluar]);
    }
    public function sewa_kontrakan(Request $request)
    {
        $id_akomodasi = $request->id;
        $durasi = $request->durasi;
        $tanggal = $request->date;
        $tanggal_masuk = Carbon::parse($tanggal)->subDays(1)->format('d-m-Y');
        $tanggal_keluar = Carbon::parse($tanggal_masuk)->addMonth($durasi)->format('d-m-Y');
        
        $akomodasi = Akomodasi::where('id_akomodasi', $id_akomodasi)->first();
        return view('penyewa.sewa-kontrakan', ['akomodasi'=>$akomodasi, 'tanggal_masuk'=>$tanggal_masuk, 'durasi'=>$durasi, 'tanggal_keluar'=>$tanggal_keluar]);
    }

    public function sewa_homestay(Request $request)
    {
        $id_akomodasi = $request->id;
        $durasi = $request->durasi;
        $tanggal = $request->date;
        $tanggal_masuk = Carbon::parse($tanggal)->subDays(1)->format('d-m-Y');
        $tanggal_keluar = Carbon::parse($tanggal_masuk)->addDay($durasi)->format('d-m-Y');
        
        $akomodasi = Akomodasi::where('id_akomodasi', $id_akomodasi)->first();
        return view('penyewa.sewa-homestay', ['akomodasi'=>$akomodasi, 'tanggal_masuk'=>$tanggal_masuk, 'durasi'=>$durasi, 'tanggal_keluar'=>$tanggal_keluar]);
    }

    public function sewa_insert(Request $request)
    {
        $id_user = auth()->user()->id;
        $id_akomodasi = $request->id_akomodasi;
        $tanggal_masuk = Carbon::parse($request->tanggal_masuk)->subDays(1)->format('Y-m-d');
        $tanggal_keluar = Carbon::parse($request->tanggal_keluar)->subDays(1)->format('Y-m-d');

        $file = $request->file('img_sewa');
        var_dump($file);
        $nama_file = time()."_Sewa_".$file->getClientOriginalName();
 
		$tujuan_upload = 'img/res/akomodasi/';
		$file->move($tujuan_upload,$nama_file);

        $sewa = Sewa::create([
            'deskripsi' => $request->deskripsi_sewa,
            'durasi' => $request->durasi,
            'tanggal_masuk' => $tanggal_masuk,
            'tanggal_keluar' => $tanggal_keluar,
            'total_harga' => $request->total_harga,
            'status_sewa' => 'not_ver',
            'img_sewa' => $nama_file,
        ]);

        $id_sewa = $sewa->id;
        
        SewaUser::create([
            'id_sewa' => $id_sewa,
            'id_user' => $id_user,
        ]);

        SewaAkomodasi::create([
            'id_sewa' => $id_sewa,
            'id_akomodasi' => $id_akomodasi,
        ]);

        // $stok = Akomodasi::where('id_akomodasi', $id_akomodasi)->first();
        // $stok_after = $stok->stok - 1;
        // Akomodasi::where('id_akomodasi', $id_akomodasi)->update([
        //     'stok' => $stok_after,
        // ]);
        
        return redirect('/penyewa/pemesanan/not-ver')->with('success', 'Berhasil memesan akomodasi');
    }

    public function pemesanan_ver()
    {
        $id = auth()->user()->id;

        $sewas = DB::table('sewas')
        ->rightjoin('sewa_users', 'sewas.id_sewa', '=', 'sewa_users.id_sewa')
        ->rightjoin('sewa_akomodasis', 'sewas.id_sewa', '=', 'sewa_akomodasis.id_sewa')
        ->rightjoin('users', 'sewa_users.id_user', '=', 'users.id')
        ->rightjoin('akomodasis', 'sewa_akomodasis.id_akomodasi', '=', 'akomodasis.id_akomodasi')
        ->where('sewa_users.id_user', $id)->where('sewas.status_sewa', 'ver')
        ->paginate(1);

        return view('penyewa.pemesanan-ver',compact('sewas'));
    }
    public function pemesanan_not_ver()
    {
        $id = auth()->user()->id;

        $sewas = DB::table('sewas')
        ->rightjoin('sewa_users', 'sewas.id_sewa', '=', 'sewa_users.id_sewa')
        ->rightjoin('sewa_akomodasis', 'sewas.id_sewa', '=', 'sewa_akomodasis.id_sewa')
        ->rightjoin('users', 'sewa_users.id_user', '=', 'users.id')
        ->rightjoin('akomodasis', 'sewa_akomodasis.id_akomodasi', '=', 'akomodasis.id_akomodasi')
        ->where('sewa_users.id_user', $id)->where('sewas.status_sewa', 'not_ver')
        ->orderByRaw('sewas.id_sewa DESC')
        ->paginate(1);

        return view('penyewa.pemesanan-not-ver',compact('sewas'));
    }

    public function pemesanan_batalkan($id)
    {
        // echo 'test';
        DB::table('sewas')->where('id_sewa', $id)->delete();
        DB::table('sewa_users')->where('id_sewa', $id)->delete();
        return back()->with('success', 'Berhasil membatalkan pemesanan');
    }

    public function pembayaran()
    {
        $id_user = auth()->user()->id;
        // echo $id_user;

        $pembayarans = DB::table('pembayarans')
        ->join('sewa_users', 'pembayarans.id_sewa', '=', 'sewa_users.id_sewa')
        ->join('sewas', 'sewa_users.id_sewa', '=', 'sewas.id_sewa')
        ->join('sewa_akomodasis', 'sewas.id_sewa', '=', 'sewa_akomodasis.id_sewa')
        ->join('akomodasis', 'sewa_akomodasis.id_akomodasi', '=', 'akomodasis.id_akomodasi')
        ->where('sewa_users.id_user', $id_user)
        ->where('pembayarans.status_pembayaran', 'not_ver')
        ->paginate(1);

        return view('penyewa.pembayaran', compact('pembayarans'));
    }
    public function pembayaran_diproses()
    {
        $id_user = auth()->user()->id;
        // echo $id_user;

        $pembayarans = DB::table('pembayarans')
        ->join('sewa_users', 'pembayarans.id_sewa', '=', 'sewa_users.id_sewa')
        ->join('sewas', 'sewa_users.id_sewa', '=', 'sewas.id_sewa')
        ->join('sewa_akomodasis', 'sewas.id_sewa', '=', 'sewa_akomodasis.id_sewa')
        ->join('akomodasis', 'sewa_akomodasis.id_akomodasi', '=', 'akomodasis.id_akomodasi')
        ->where('sewa_users.id_user', $id_user)
        ->where('pembayarans.status_pembayaran', 'diproses')
        ->paginate(3);

        return view('penyewa.pembayaran-diproses', compact('pembayarans'));
    }
    public function pembayaran_berhasil()
    {
        $id_user = auth()->user()->id;
        // echo $id_user;

        $pembayarans = DB::table('pembayarans')
        ->join('sewa_users', 'pembayarans.id_sewa', '=', 'sewa_users.id_sewa')
        ->join('sewas', 'sewa_users.id_sewa', '=', 'sewas.id_sewa')
        ->join('sewa_akomodasis', 'sewas.id_sewa', '=', 'sewa_akomodasis.id_sewa')
        ->join('akomodasis', 'sewa_akomodasis.id_akomodasi', '=', 'akomodasis.id_akomodasi')
        ->where('sewa_users.id_user', $id_user)
        ->where('pembayarans.status_pembayaran', 'ver')
        ->paginate(3);

        return view('penyewa.pembayaran-berhasil', compact('pembayarans'));
    }

    public function pesan_pembayaran(Request $request)
    {
        $id_penyewa = auth()->user()->id;
        $id_sewa = $request->id_sewa;

        $sewa = Sewa::rightjoin('sewa_akomodasis', 'sewas.id_sewa', '=', 'sewa_akomodasis.id_sewa')
        ->rightjoin('akomodasi_users', 'sewa_akomodasis.id_akomodasi', '=', 'akomodasi_users.id_akomodasi')
        ->where('sewas.id_sewa', $id_sewa)->first();

        $id_penyedia = $sewa->id_user;

        $tanggal_masuk = Carbon::parse($request->tanggal_masuk)->subDays(1)->format('Y-m-d H:i:s');
        $batas_pembayaran = Carbon::parse($tanggal_masuk)->addDays(3)->format('Y-m-d H:i:s');
        echo $batas_pembayaran;

        $sewa = Pembayaran::create([
            'id_sewa' => $id_sewa,
            'id_penyedia' => $id_penyedia,
            'status_pembayaran' => 'not_ver',
            'batas_pembayaran' => $batas_pembayaran,
        ]);

        Sewa::where('id_sewa', $id_sewa)->update([
            'status_sewa' => 'sedang_bayar',
        ]);
        
        return redirect('penyewa/pembayaran')->with('success' , 'Silahkan masukkan bukti transfer');
    }

    public function pembayaran_bukti(Request $request)
    {
        $id_pembayaran = $request->id_pembayaran;

        $file = $request->file('img_pembayaran');
        $nama_file = time()."_".$file->getClientOriginalName();
 
		$tujuan_upload = 'img/res/bukti/';
		$file->move($tujuan_upload,$nama_file);

        Pembayaran::where('id_pembayaran', $id_pembayaran)->update([
            'img_pembayaran' => $nama_file,
            'status_pembayaran' => 'diproses',
        ]);
        return redirect('penyewa/pembayaran-diproses')->with('success' , 'Sukses memasukkan bukti transfer');
    }

    public function pembayaran_detail($id)
    {
        $id_user = auth()->user()->id;

        $pembayaran = Pembayaran::join('sewa_users', 'pembayarans.id_sewa', '=', 'sewa_users.id_sewa')
        ->join('sewas', 'sewa_users.id_sewa', '=', 'sewas.id_sewa')
        ->join('sewa_akomodasis', 'sewas.id_sewa', '=', 'sewa_akomodasis.id_sewa')
        ->join('akomodasis', 'sewa_akomodasis.id_akomodasi', '=', 'akomodasis.id_akomodasi')
        ->where('sewa_users.id_user', $id_user)
        ->where('pembayarans.id_pembayaran', $id)
        ->first();
        
        return view('penyewa/pembayaran-detail', compact('pembayaran'));
    }

    public function pengaturan()
    {
        return view('penyewa.pengaturan');
    }

    public function pengaturan_edit_profile($id)
    {
        $user = User::where('id', $id)->first();
        return view('penyewa/pengaturan-edit', compact('user'));
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
        return redirect('penyewa/pengaturan/')->with('success', 'Berhasil mengubah profile');
    }
    public function pengaturan_update_password(Request $request, $id)
    {
        User::where('id', $id)->update([
            'password' => Hash::make($request->password),
        ]);
        return redirect('penyewa/pengaturan')->with('success', 'Berhasil mengganti password');
    }
}
