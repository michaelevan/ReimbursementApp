<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function formLogin() {
        return view("login");
    }

    public function loginData(Request $request)
    {
        // $users = User::all();
        // foreach ($users as $user) {
        //     $hashedPassword = Hash::make($user->password);
        //     $user->password = $hashedPassword;
        //     $user->save();
        // }
        $request->validate([
            'nip' => 'required|numeric',
            'password' => 'required',
        ]);
        if (Auth::attempt(['nip' => $request->nip, 'password' => $request->password])) {
            // Tentukan halaman tujuan berdasarkan peran pengguna
            if (Auth::user()->jabatan == "Staff") {
                return redirect('/staff');
            } elseif (Auth::user()->jabatan == "Direktur") {
                return redirect('/direktur');
            } elseif (Auth::user()->jabatan == "Finance") {
                return redirect('/finance');
            }
        }
        else{
            return back()->withErrors([
                'nip' => 'Invalid NIP',
                'password' => 'Invalid Password',
            ]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/')->with('success', 'anda berhasil logout!');
    }
}
