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
        $attributes = $request->validate([
            "type" => ["required", Rule::in(["graduate", "staff"])],
            "first_name" => ["required", "max:255"],
            "last_name" => ["required", "max:255"],
            "gender" => ["required", Rule::in(["male", "female"])],
            "email" => ["required", "email", "max:255"],
            "phone" => ["required", "max:255"],
            "registration_number" => ["nullable", "string", "max:255"],
            "graduation_year" => ["required_if:type,graduate"],
            "course_id" => ["required_if:type,graduate"],
            "current_employee" => ["nullable", "string", "max:255"],
            "position" => ["nullable", "string", "max:255"],
            "password" => ["required", "max:255", "confirmed"],
        ]);

        Alumnus::create($attributes);

        $request->session()->flash("status-success", "Your registration has been completed successfully");

        return redirect()->back();
    }
}
