@extends('layouts.app')

@section("content")
    <div class="container">
        <div class="card">
            <div class="card-header">Alumni</div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alumni as $alumnus)
                    <tr>
                        <td>{{ $alumnus->name }}</td>
                        <td>{{ $alumnus->email }}</td>
                        <td>{{ $alumnus->phone }}</td>
                        <td>{{ $alumnus->type }}</td>
                        <td>
                            <a href="{{ route("alumnus") }}"></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
