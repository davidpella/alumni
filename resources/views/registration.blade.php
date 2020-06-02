@extends('layouts.app')

@section('content')
    <div class="container-sm">
        <div class="row">
            <div class="col-md-4">
                <img
                    src="https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=987&q=80"
                    alt=""
                    class="w-100 h-100"
                    style="object-fit: cover"
                />
            </div>
            <div class="col-md-8">
                @if(session()->has('status-success'))
                <div class="alert alert-success mb-4">
                    {{ session("status-success") }}
                </div>
                @endif

                <form action="{{ route('alumni.register') }}" method="post" class="card">

                    @csrf

                    <div class="card-header">Registration</div>

                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="type">Type</label>
                                <select id="type" name="type" class="form-control @error('type') is-invalid @enderror">
                                    <option value="">Choose...</option>
                                    <option value="graduate" @if(old('type') == 'graduate') selected @endif>Graduate</option>
                                    <option value="staff" @if(old('type') == 'staff') selected @endif>Staff</option>
                                </select>
                                @error('type')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="first_name">First name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old("first_name") }}">
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="middle_name">Middle name <span class="text-muted">(Optional)</span></label>
                                <input type="text" name="middle_name" id="middle_name" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="last_name">Last name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old("last_name") }}">
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror">
                                    <option value="">Choose...</option>
                                    <option value="male" @if(old('gender') == 'male') selected @endif>Male</option>
                                    <option value="female" @if(old('gender') == 'female') selected @endif>Female</option>
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                        </div>

                        <hr />

                        <div id="graduation">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="registration_number">Registration number</label>
                                    <input type="text" name="registration_number" id="registration_number" class="form-control @error('registration_number') is-invalid @enderror" value="{{ old("registration_number") }}">
                                    @error('registration_number')
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="graduation_year">Graduation year</label>
                                    <select id="graduation_year" name="graduation_year" class="form-control @error('graduation_year') is-invalid @enderror">
                                        <option value="">Choose...</option>
                                        @foreach(range(1, 21) as $year)
                                            <option value="{{ $year }}" @if(old('graduation_year') == $year) selected @endif>
                                                {{ \Carbon\Carbon::now()->subYears($year)->year }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('graduation_year')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="course_id">Course</label>
                                    <select id="course_id" name="course_id" class="form-control @error('course_id') is-invalid @enderror">
                                        <option value="">Choose...</option>
                                        @foreach(\App\Models\Course::all() as $course)
                                            <option value="{{ $course->id }}" @if(old('course_id') == $course->id) selected @endif>
                                                {{ $course->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('course_id')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="current_employee">Current Employee</label>
                                <input type="text" name="current_employee" id="current_employee" class="form-control @error('current_employee') is-invalid @enderror" value="{{ old('current_employee') }}">
                                @error('current_employee')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="position">Position</label>
                                <input type="text" name="position" id="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}">
                                @error('position')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr />

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old("email") }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Phone</label>
                                <input type="tel" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old("phone") }}">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password_confirmation">Password confirmation</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-end">
                        <button class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("type").addEventListener("change", function (event) {
            let alumniType = event.target.value;

            if(alumniType === 'staff') {
                document.getElementById("graduation").style.display = "none";
            } else {
                document.getElementById("graduation").style.display = "block";
            }
        });
    </script>
@endsection
