<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    protected $table = "users";
    protected $primaryKey = "nip";
    public $timestamps = true;
    public $incrementing = false;
    // use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    function tambahKaryawan($param) {
        // dd($param->nip);
        // $pesan = [
        //     'nip.unique' => 'username sudah dipakai dan tidak boleh sama',
        //     'nip.integer' => 'nip harus berisikan angka saja',
        //     'nip.max' => 'nip maksimal terdapat 10 huruf',
        //     'password.max' => 'Password maksimal terdapat 10 huruf',
        // ];
        // $validation = $param->validate([
        //     "nip" => "unique:users,nip|integer|digits:10",
        //     'password' => 'max:10'
        // ], $pesan);

        $users = new User();
        $users->nip = $param->nip;
        $users->nama = $param->nama;
        $users->jabatan = $param->jabatan;
        $users->password = Hash::make($param->password);
        $users->save();
        return $param;
    }
    function editKaryawan($param, $id) {
        if ($param->password != $param->konfirmasiPassword) {
            return back()->withErrors(['error' => 'Password harus sama dengan konfirmasi password']);
        }
        else{
            User::where("nip", $id)->update([
                "nama" => $param->nama,
                "jabatan" => $param->jabatan,
                "password" => Hash::make($param->password)
            ]);
        }
        return $id;
    }
    function deleteKaryawan($id) {
        User::where('nip', $id)->delete();
        return $id;
    }
}
