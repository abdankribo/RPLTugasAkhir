<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = 'Karyawan';
        $data['q'] = $request->get('q');
        $data['karyawan'] = Karyawan::where('nama', 'like', '%' .$data['q']. '%')->join('levels', 'karyawans.id_level', '=', 'levels.id')->get();
        return view('karyawan\karyawan', $data);
    }

    public function add(Request $request)
    {
        $data['title'] = 'Karyawan';
        $data['level'] = Level::get();
        return view('karyawan\add_karyawan', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'id_level' => 'required'
        ]);
        // $menu->save();
        Karyawan::create($validatedData);
        return redirect()->route('karyawan.index')->with('success', 'Success Creating Menu');
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'id_level' => 'required'
        ]);

        Karyawan::where('id', $karyawan->id)->update($validatedData);
        return redirect()->route('karyawan.index')->with('success', 'Success Editing Karyawan');
    }

    public function destroy(Karyawan $karyawn)
    {
        Karyawan::destroy($karyawn->id);
        return redirect()->route('karyawan.index')->with('success', 'Success Deleting Karyawan');
    }
}
