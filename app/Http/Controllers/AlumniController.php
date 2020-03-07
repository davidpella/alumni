<?php

namespace App\Http\Controllers;

use App\Models\Alumnus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AlumniController extends Controller
{
    public function store(Request $request)
    {
        $attributes = $this->validate($request, [
            "type" => ["required", Rule::in(["graduate", "staff"])],
            "first_name" => ["required", "max:255"],
            "last_name" => ["required", "max:255"],
            "gender" => ["required", Rule::in(["male", "female"])],
            "email" => ["required", "email", "max:255"],
            "phone" => ["required", "max:255"],
            "registration_number" => ["max:255"],
            "graduation_year" => ["required"],
            "course_id" => ["required"],
            "current_employee" => ["required", "max:255"],
            "position" => ["required", "max:255"],
            "password" => ["required", "max:255", "confirmed"],
        ]);

        $alumni = Alumnus::create($attributes);

        return redirect()->back();

        //Auth::loginUsingId($alumni);
    }
}
