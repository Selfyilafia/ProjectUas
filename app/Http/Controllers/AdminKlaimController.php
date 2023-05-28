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
}
