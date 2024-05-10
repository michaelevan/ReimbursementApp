<?php

namespace App\Http\Controllers;

use App\Models\Reimbursement;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function formStaff() {
        $listReimbursement = Reimbursement::all();

        return view("dashboardStaff", [
            "listReimbursement" => $listReimbursement,
        ]);
    }
    public function formBuatReimbursement() {
        return view("formReimbursement");
    }
    public function tambahReimbursement(Request $request) {
        $reimbursement = new Reimbursement();
        $result = $reimbursement->tambahReimbursement($request);

        if ($result){
            return back()->with("success", "Berhasil Tambah Reimbursement Baru!");
        }
        else{
            return back()->withErrors(['error' => 'Gagal tambah Reimbursement Baru!']);
        }
    }
    public function formEditReimbursement() {
        return view("formReimbursement");
    }
}
