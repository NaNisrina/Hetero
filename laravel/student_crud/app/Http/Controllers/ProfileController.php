<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Users;

/* $data = ['nama' => 'Najwa Nisrina', 'umur' => '16',
        'kelas' => 'XI-RPL 2', 'no_absen' => '16',
        'alamat' => 'Jl. Ktt Baru Tengah 10',
        'sekolah' => 'SMKN 1', 'magang' => 'Nusa Indo'];
*/

class ProfileController extends Controller 
{
    public function prodex() 
    {
        // $pros = Siswa::select("*")
        //         -> where("id", 1)
        //         -> orderBy("id", "desc")
        //         -> get();

        return view('profile', [
            "title" => "Profile",
            "prof" => Siswa::all()
        ]);

    }

    public function prous() 
    {
        return view('users', [
            "title" => "Users",
            "prof" => Users::all()
        ]);

    }

    public function prode() 
    {
        // $pros = Siswa::select("*")
        //         -> where("id", 1)
        //         -> orderBy("id", "desc")
        //         -> get();

        return view('profil', [
            "title" => "Profil",
            "prof" => Siswa::all()
        ]);

    }

    public function proshow()
    {
        return view('siswa', [
            "title" => "Create"
        ]);
    }

    public function proin(Request $request)
    {
        // dd($request->all());
        Siswa::create($request->all());

        return redirect()->route('profile')->with('success', 'Data Created');
    }

    public function proid($id)
    {
        $data = Siswa::find($id);
        // dd($data);

        return view('show', compact('data'), [
            "title" => "Show"
        ]);
    }

    public function proids(Request $request, $id)
    {
        $data = Siswa::find($id);
        $data -> update($request->all());

        return redirect()->route('profile')->with('success', 'Data Updated');
    }

    public function proidd($id)
    {
        $data = Siswa::find($id);
        $data -> delete();

        return redirect()->route('profile')->with('success', 'Data Deleted');
    }

    // -----------------------------

    public function ushows()
    {
        return view('users', [
            "title" => "User Create"
        ]);
    }

    public function uin(Request $request)
    {
        // dd($request->all());
        Users::create($request->all());

        return redirect()->route('users')->with('success', 'Data Created');
    }

    public function uid($id)
    {
        $data = Users::find($id);
        // dd($data);

        return view('shows', compact('data'), [
            "title" => "User Show"
        ]);
    }

    public function uids(Request $request, $id)
    {
        $data = Users::find($id);
        $data -> update($request->all());

        return redirect()->route('users')->with('success', 'Data Updated');
    }

    public function uidd($id)
    {
        $data = Users::find($id);
        $data -> delete();

        return redirect()->route('users')->with('success', 'Data Deleted');
    }


}
