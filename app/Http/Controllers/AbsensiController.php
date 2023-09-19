<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = 'Absensi';
        $data['q'] = $request->get('q');
        // $data['absensi'] = Absensi::select('nama,time(TIMEDIFF(jam_masuk,jam_pulang)) as total')->join('karyawans', 'absensis.id_karyawan', '=', 'karyawans.id')->where('absensis.id_karyawan', 1)->get();
        $data['absensi'] = Absensi::where('hari_masuk', 'like', '%' .$data['q']. '%')->join('karyawans', 'absensis.id_karyawan', '=', 'karyawans.id')->selectRAW('nama,hari_masuk,jam_masuk,jam_pulang,time(TIMEDIFF(jam_pulang,jam_masuk)) as total')->get();
        return view('/absensi/absensi', $data);
    }

    public function add()
    {
        $data['title'] = 'Absensi';
        $data['karyawan'] = Karyawan::get();
        return view('/absensi/add_absensi', $data);
    }

    public function simpan(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'id_karyawan' => 'required',
            'hari_masuk' => 'required',
            'jam_masuk' => 'required',
            'jam_pulang' => 'required'
        ]);
        $absensi = new Absensi([
            'id_karyawan' => $request->id_karyawan,
            'hari_masuk' => $request->hari_masuk,
            'jam_masuk' => $request->jam_masuk,
            'jam_pulang' => $request->jam_pulang
        ]);
        // $menu->save();
        // Absensi::create($validatedData);
        // dd($request);
        $absensi->save();
    //     $absensi->id;
    //     $total = Absensi::selectRAW('time(TIMEDIFF(jam_pulang,jam_masuk)) as total')->where('id', $absensi->id);
    //     // dd($total);
    //    $total_jam = strval($total);
    //     Absensi::where('id', $absensi->id)->update([
    //         'total_jam' => $total_jam
    //     ]);
        // select('time(sum(TIMEDIFF( jam_masuk, jam_pulang ))) as total')->get();
        return redirect()->route('absensi')->with('success', 'Success Creating Menu');
    }
}
