<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Karyawan;
use App\Models\Level;
use App\Models\Gaji;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use PDF;

class GajiController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = 'Absensi';
        return view('/gaji/gaji', $data);
    }

    public function gaji(Request $request)
    {
        // dd($request);
        $data['title'] = 'Absensi';
        $data['tgl_awal'] = $request->tgl_awal;
        $data['tgl_akhir'] = $request->tgl_akhir;
        // $data['absensi'] = Absensi::select('nama,time(TIMEDIFF(jam_masuk,jam_pulang)) as total')->join('karyawans', 'absensis.id_karyawan', '=', 'karyawans.id')->where('absensis.id_karyawan', 1)->get();
        // $data['gaji'] = Absensi::where('absensis.hari_masuk', 'BETWEEN ' .'2023-06-10'. ' AND ' .'2023-06-11')->join('karyawans', 'absensis.id_karyawan', '=', 'karyawans.id')->join('levels', 'karyawans.id_level', '=', 'levels.id')->selectRAW('karyawans.nama,levels.gaji,time(sum(TIMEDIFF( jam_pulang, jam_masuk ))) as total, HOUR(time(sum(TIMEDIFF( jam_pulang, jam_masuk )))) * levels.gaji as totaljam')->get();
        // $data['gaji'] = Absensi::select('SELECT karyawans.nama,levels.gaji,time(sum(TIMEDIFF( jam_pulang, jam_masuk ))) as total, HOUR(time(sum(TIMEDIFF( jam_pulang, jam_masuk )))) * levels.gaji as totaljam WHERE absensis.hari_masuk BETWEEN "2023-06-10" AND "2023-06-11" GROUP BY karyawans.nama')->join('karyawans', 'absensis.id_karyawan', '=', 'karyawans.id')->join('levels', 'karyawans.id_level', '=', 'levels.id')->get();
        $data['absensi'] = Absensi::whereBetween('absensis.hari_masuk', [$request->tgl_awal, $request->tgl_akhir])
        ->join('karyawans', 'absensis.id_karyawan', '=', 'karyawans.id')
        ->join('levels', 'karyawans.id_level', '=', 'levels.id')
        ->selectRaw('karyawans.id,karyawans.nama, levels.gaji, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(jam_pulang, jam_masuk)))) AS total, HOUR(SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(jam_pulang, jam_masuk))))) * levels.gaji AS totaljam')
        ->get();
        // dd($data['absensi']);
        return view('/gaji/gaji_data', $data);
    }
    public function topdf(Request $request){
        $data['title'] = 'Absensi';
        $data['id_karyawan'] = $request->id_karyawan;
        $data['tgl_awal'] = $request->tgl_awal;
        $data['tgl_akhir'] = $request->tgl_akhir;
        // dd($data);
        $data['absensi'] = Absensi::where('id_karyawan', '=', $request->id_karyawan)->whereBetween('absensis.hari_masuk', [$request->tgl_awal, $request->tgl_akhir])
        ->join('karyawans', 'absensis.id_karyawan', '=', 'karyawans.id')
        ->join('levels', 'karyawans.id_level', '=', 'levels.id')
        ->selectRaw('absensis.id_karyawan,karyawans.nama,absensis.hari_masuk, absensis.jam_masuk, absensis.jam_pulang, levels.gaji, SEC_TO_TIME(TIME_TO_SEC(TIMEDIFF(jam_pulang, jam_masuk))) AS total, HOUR(SEC_TO_TIME(TIME_TO_SEC(TIMEDIFF(jam_pulang, jam_masuk)))) * levels.gaji AS totaljam')
        ->get();

        $data['total'] = Absensi::where('id_karyawan', '=', $request->id_karyawan)->whereBetween('absensis.hari_masuk', [$request->tgl_awal, $request->tgl_akhir])
        ->join('karyawans', 'absensis.id_karyawan', '=', 'karyawans.id')
        ->join('levels', 'karyawans.id_level', '=', 'levels.id')->selectRaw('HOUR(SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(jam_pulang, jam_masuk))))) * levels.gaji AS totalgaji')
        ->get();
        $pdf = PDF::loadView('/gaji/gajipdf', $data);
        return $pdf->download('lala.pdf');
    }
}
