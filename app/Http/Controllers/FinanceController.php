<?php

namespace App\Http\Controllers;

use App\Models\Reimbursement;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function formFinance() {
        $listReimbursement = Reimbursement::where('status_persetujuan', 1)->get();

        return view("dashboardFinance", [
            "listReimbursement" => $listReimbursement,
        ]);
    }
    public function terimaPembayaran($id) {
        $reim = new Reimbursement();
        $result = $reim->terimaPembayaran($id);

        if ($result){
            return back()->with("success", "Berhasil Terima Pembayaran");
        }
        else{
            return back()->withErrors(['error' => 'Gagal Terima Pembayaran']);
        }
    }
    public function tolakPembayaran($id) {
        $reim = new Reimbursement();
        $result = $reim->tolakPembayaran($id);

        if ($result){
            return back()->with("success", "Berhasil Tolak Pembayaran");
        }
        else{
            return back()->withErrors(['error' => 'Gagal Tolak Pembayaran']);
        }
    }
}
