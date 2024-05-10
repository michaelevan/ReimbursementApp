<?php

namespace App\Http\Controllers;

use App\Models\Reimbursement;
use App\Models\User;
use Illuminate\Http\Request;

class DirekturController extends Controller
{
    public function formDirektur() {
        $listReimbursement = Reimbursement::all();

        return view("dashboardDirektur", [
            "listReimbursement" => $listReimbursement,
        ]);
    }
    public function formListKaryawan() {
        $listKaryawan = User::all();

        return view("listKaryawan", [
            "listKaryawan" => $listKaryawan,
        ]);
    }
    public function formTambahKaryawan() {
        return view("tambahKaryawan");
    }
    public function tambahKaryawan(Request $request) {
        if ($request->jabatan == null) {
            return back()->withErrors(['error' => 'pilih jabatan terlebih dahulu']);
        }
        elseif ($request->password != $request->konfirmasiPassword) {
            return back()->withErrors(['error' => 'Password harus sama dengan konfirmasi password']);
        }
        else{
            $users = new User();
            $result = $users->tambahKaryawan($request);

            if ($result){
                return redirect('/direktur/listKaryawan')->with("success", "Berhasil Tambah Karyawan!");
            }
            else{
                return redirect('/direktur/listKaryawan')->withErrors(['error' => 'Gagal tambah karyawan!']);
            }
        }
    }
    public function terimaReimbursement($id) {
        $reim = new Reimbursement();
        $result = $reim->terimaReimbursement($id);

        if ($result){
            return back()->with("success", "Berhasil Terima Reimbursement");
        }
        else{
            return back()->withErrors(['error' => 'Gagal Terima Reimbursement']);
        }
    }
    public function tolakReimbursement($id) {
        $reim = new Reimbursement();
        $result = $reim->tolakReimbursement($id);

        if ($result){
            return back()->with("success", "Berhasil Tolak Reimbursement");
        }
        else{
            return back()->withErrors(['error' => 'Gagal Tolak Reimbursement']);
        }
    }
    public function formEditKaryawan($id) {
        $dataKaryawan = User::where('nip', $id)->first();
        return view("editKaryawan", [
            "dataKaryawan" => $dataKaryawan,
        ]);
    }
    public function editKaryawan(Request $request, $id) {
        if ($request->has("btnUbah")) {
            $edit = new User();
            $result = $edit->editKaryawan($request, $id);

            if ($result){
                return back()->with("success", "Berhasil Edit Data User");
            }
            else{
                return back()->withErrors(['error' => 'Gagal Edit Data User']);
            }
        }
        else if ($request->has("btnHapus")) {
            $reim = new User();
            $result = $reim->deleteKaryawan($id);

            if ($result){
                return redirect('/direktur/listKaryawan')->with("success", "Berhasil Delete Data User");
            }
            else{
                return redirect('/direktur/listKaryawan')->withErrors(['error' => 'Gagal Delete Data User']);
            }
        }
    }
}
