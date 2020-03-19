<?php

namespace App\Http\Controllers\Administrator;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::query()->latest()->get();

        return view("courses.index", ["courses" => $courses]);
    }

    public function store(Request $request)
    {
        $this->validate($request, ["name" => ["required"]]);

        Course::create($request->only(["name"]));

        return redirect()->back();
    }

    public function update(Request $request, Course $course)
    {
        $this->validate($request, ["name" => ["required"]]);

        $course->update($request->only(["name"]));

        return redirect()->back();
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->back();
    }
}
