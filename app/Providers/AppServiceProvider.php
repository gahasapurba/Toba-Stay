<?php

namespace App\Providers;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view)
        {
            if (Auth::check()) {

                $id_user = auth()->user()->id;

                // $sewa = DB::table('sewas')
                // ->rightjoin('sewa_users', 'sewas.id_sewa', '=', 'sewa_users.id_sewa')
                // ->where('sewa_users.id_user', $id_user)
                // ->count();
                $sewa_ver = DB::table('sewas')
                ->rightjoin('sewa_users', 'sewas.id_sewa', '=', 'sewa_users.id_sewa')
                ->where('sewa_users.id_user', $id_user)
                ->where('sewas.status_sewa', 'ver')
                ->count();
                $sewa_notver = DB::table('sewas')
                ->rightjoin('sewa_users', 'sewas.id_sewa', '=', 'sewa_users.id_sewa')
                ->where('sewa_users.id_user', $id_user)
                ->where('sewas.status_sewa', 'not_ver')
                ->count();

                $sewa = $sewa_notver + $sewa_ver;

                // $pemesanan = DB::table('sewas')
                // ->rightjoin('sewa_akomodasis', 'sewas.id_sewa', '=', 'sewa_akomodasis.id_sewa')
                // ->rightjoin('akomodasis', 'sewa_akomodasis.id_akomodasi', '=', 'akomodasis.id_akomodasi')
                // ->rightjoin('akomodasi_users', 'akomodasis.id_akomodasi', '=', 'akomodasi_users.id_akomodasi')
                // ->rightjoin('sewa_users', 'sewas.id_sewa', '=', 'sewa_users.id_sewa')
                // ->rightjoin('users', 'sewa_users.id_user', '=', 'users.id')
                // ->where('akomodasi_users.id_user', $id_user)
                // ->count();
                $pemesanan_ver = DB::table('sewas')
                ->rightjoin('sewa_akomodasis', 'sewas.id_sewa', '=', 'sewa_akomodasis.id_sewa')
                ->rightjoin('akomodasis', 'sewa_akomodasis.id_akomodasi', '=', 'akomodasis.id_akomodasi')
                ->rightjoin('akomodasi_users', 'akomodasis.id_akomodasi', '=', 'akomodasi_users.id_akomodasi')
                ->rightjoin('sewa_users', 'sewas.id_sewa', '=', 'sewa_users.id_sewa')
                ->rightjoin('users', 'sewa_users.id_user', '=', 'users.id')
                ->where('akomodasi_users.id_user', $id_user)
                ->where('sewas.status_sewa', 'ver')
                ->count();
                
                $pemesanan_notver = DB::table('sewas')
                ->rightjoin('sewa_akomodasis', 'sewas.id_sewa', '=', 'sewa_akomodasis.id_sewa')
                ->rightjoin('akomodasis', 'sewa_akomodasis.id_akomodasi', '=', 'akomodasis.id_akomodasi')
                ->rightjoin('akomodasi_users', 'akomodasis.id_akomodasi', '=', 'akomodasi_users.id_akomodasi')
                ->rightjoin('sewa_users', 'sewas.id_sewa', '=', 'sewa_users.id_sewa')
                ->rightjoin('users', 'sewa_users.id_user', '=', 'users.id')
                ->where('akomodasi_users.id_user', $id_user)
                ->where('sewas.status_sewa', 'not_ver')
                ->count();

                $pemesanan = $pemesanan_notver + $pemesanan_ver;

                $pembayaran_penyedia = DB::table('pembayarans')
                ->where('id_penyedia', $id_user)
                ->count();

                $pembayaran_p = 

                $pembayaran_penyewa = DB::table('pembayarans')
                ->join('sewa_users', 'pembayarans.id_sewa', '=', 'sewa_users.id_sewa')
                ->join('sewas', 'sewa_users.id_sewa', '=', 'sewas.id_sewa')
                ->join('sewa_akomodasis', 'sewas.id_sewa', '=', 'sewa_akomodasis.id_sewa')
                ->join('akomodasis', 'sewa_akomodasis.id_akomodasi', '=', 'akomodasis.id_akomodasi')
                ->where('sewa_users.id_user', $id_user)
                ->where('pembayarans.status_pembayaran', 'not_ver')
                ->count();

                $pembayaran_penyewa_diproses = DB::table('pembayarans')
                ->join('sewa_users', 'pembayarans.id_sewa', '=', 'sewa_users.id_sewa')
                ->join('sewas', 'sewa_users.id_sewa', '=', 'sewas.id_sewa')
                ->join('sewa_akomodasis', 'sewas.id_sewa', '=', 'sewa_akomodasis.id_sewa')
                ->join('akomodasis', 'sewa_akomodasis.id_akomodasi', '=', 'akomodasis.id_akomodasi')
                ->where('sewa_users.id_user', $id_user)
                ->where('pembayarans.status_pembayaran', 'diproses')
                ->count();

                $pembayaran_penyewa_berhasil = DB::table('pembayarans')
                ->join('sewa_users', 'pembayarans.id_sewa', '=', 'sewa_users.id_sewa')
                ->join('sewas', 'sewa_users.id_sewa', '=', 'sewas.id_sewa')
                ->join('sewa_akomodasis', 'sewas.id_sewa', '=', 'sewa_akomodasis.id_sewa')
                ->join('akomodasis', 'sewa_akomodasis.id_akomodasi', '=', 'akomodasis.id_akomodasi')
                ->where('sewa_users.id_user', $id_user)
                ->where('pembayarans.status_pembayaran', 'ver')
                ->count();

                $pembayaran_p = $pembayaran_penyewa + $pembayaran_penyewa_diproses + $pembayaran_penyewa_berhasil;

                $view->with([
                'sewa' => $sewa,
                'sewa_ver' => $sewa_ver,
                'sewa_notver' => $sewa_notver,
                'pemesanan' => $pemesanan,
                'pemesanan_ver' => $pemesanan_ver,
                'pemesanan_notver' => $pemesanan_notver,
                'pembayaran_penyedia' => $pembayaran_penyedia,
                'pembayaran_penyewa' => $pembayaran_penyewa,
                'pembayaran_penyewa_diproses' => $pembayaran_penyewa_diproses,
                'pembayaran_penyewa_berhasil' => $pembayaran_penyewa_berhasil,
                'pembayaran_p' => $pembayaran_p,
                ]);

            }else {
                $view->with('sewa', '0');
            }
        });
 

       
    }
}
