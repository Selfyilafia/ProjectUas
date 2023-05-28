<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Klaim;

class AdminKlaimController extends Controller
{
    public function index()
    {
        
        return view('admin.index',[
            "title" => "Pengajuan Klaim",
            'klaims' => Klaim::all()
        ]);
    }

    public function selesai($id)
    {
        
        $klaim = Klaim::where('id',$id)->first();

        
        $klaim->post->status = 'Selesai';

        $klaim->post->save();

        return redirect('/klaims')->with('success', 'Pengajuan klaim sudah terupdate');
    }
    public function proses($id)
    {
        
        $klaim = Klaim::where('id',$id)->first();

        
        $klaim->post->status = 'Diproses';

        $klaim->post->save();

        return redirect('/klaims')->with('success', 'Pengajuan klaim sudah terupdate');
    }
    public function gagal($id)
    {
        
        $klaim = Klaim::where('id',$id)->first();

        
        $klaim->post->status = 'Gagal';

        $klaim->post->save();

        return redirect('/klaims')->with('success', 'Pengajuan klaim sudah terupdate');
    }
}
