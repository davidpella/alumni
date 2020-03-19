@extends('layouts.app')

@section("content")
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{ $alumnus->name }}
            </div>

            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>First name</th>
                            <td>{{ $alumnus->first_name }}</td>
                        </tr>
                        <tr>
                            <th>Middle name</th>
                            <td>{{ $alumnus->middle_name }}</td>
                        </tr>
                        <tr>
                            <th>Last name</th>
                            <td>{{ $alumnus->last_name }}</td>
                        </tr>
                        <tr>
                            <th>Course</th>
                            <td>{{ optional($alumnus->course)->name }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
