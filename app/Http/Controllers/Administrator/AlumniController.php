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

    public function index(Request $request)
    {
        return view("alumni.index", [
            "alumni" => Alumnus::latest()
                ->when($request->has('q'), function ($query){
                    $query->search(request("q"));
                })
                ->paginate()
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
