<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Alumnus;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        return view("alumni.index", [
            "alumni" => Alumnus::latest()->paginate()
        ]);
    }

    public function edit(Alumnus $alumnus)
    {
        return view("alumni.show", ["alumnus" => $alumnus]);
    }

    public function show(Alumnus $alumnus)
    {
        return view("alumni.show", ["alumnus" => $alumnus]);
    }
}
