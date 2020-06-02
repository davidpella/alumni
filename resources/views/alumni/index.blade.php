@extends('layouts.app')

@section("content")
    <div class="container">
        <form class="mb-4">
            <input type="search" aria-label="search" name="q" class="form-control" placeholder="Search..." />
        </form>

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
                            <a href="{{ route("alumni.show", $alumnus) }}">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $alumni->links() }}
        </div>
    </div>
@endsection
