<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Reimbursement extends Model
{
    // use HasFactory;
    protected $table = "reimbursement";
    protected $primaryKey = "id";
    public $timestamps = false;
    public $incrementing = true;

    function tambahReimbursement($param) {
        $reimbursement = new Reimbursement();
        $reimbursement->nip = Auth::user()->nip;
        $reimbursement->nama_reimbursement = $param->nama_reimbursement;
        $reimbursement->deskripsi = $param->deskripsi;
        $reimbursement->status_persetujuan = 0;
        $reimbursement->status_pembayaran = 0;
        $reimbursement->tanggal = $param->tanggal;
        if ($param->hasFile('files')) {
            $files = $param->file('files');
            $reimbursement->files = $files->getClientOriginalName();
            $files->move('images/form/', $reimbursement->files);
        }
        $reimbursement->save();
        return $param;
    }
    public function nipUser()
    {
        return $this->belongsTo(User::class, 'nip');
    }
    function terimaReimbursement($id) {
        Reimbursement::where("id", $id)->update([
            "status_persetujuan" => 1
        ]);
        return $id;
    }
    function tolakReimbursement($id) {
        Reimbursement::where("id", $id)->update([
            "status_persetujuan" => 2
        ]);
        return $id;
    }
    function terimaPembayaran($id) {
        Reimbursement::where("id", $id)->update([
            "status_pembayaran" => 1
        ]);
        return $id;
    }
    function tolakPembayaran($id) {
        Reimbursement::where("id", $id)->update([
            "status_pembayaran" => 2
        ]);
        return $id;
    }
}
