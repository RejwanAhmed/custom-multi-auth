@extends('admin.layouts')
@section('title', 'Student')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center mt-2 mb-2">
                <h2>Student Form <span><a class="float-start btn btn-secondary fw-bold mt-1"
                            href="{{ route('admin.student.show') }}">Back</a></span></h2>
            </div>
        </div>
        <form action="{{ route('admin.student.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="row justify-content-start card-body shadow p-2">
                        <div class="col-lg-6 col-md-6 col-12 mb-2">
                            <label for="" class="fw-bold">Name:</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                placeholder="Enter Your Name">
                            @error('name')
                                <small class="fw-bold text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-lg-6 col-md-6 col-12 mb-2">
                            <label for="" class="fw-bold">Session:</label>
                            <input type="text" name="session" class="form-control" value="{{ old('session') }}"
                                placeholder="Enter Your Session">
                            @error('session')
                                <small class="fw-bold text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-lg-6 col-md-6 col-12 mb-2">
                            <label for="" class="fw-bold">Roll:</label>
                            <input type="number" name="roll" class="form-control" value="{{ old('roll') }}"
                                placeholder="Enter Your Roll">
                            @error('roll')
                                <small class="fw-bold text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-lg-6 col-md-6 col-12 mb-2">
                            <label for="" class="fw-bold">Email:</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                placeholder="Enter Your Email">
                            @error('email')
                                <small class="fw-bold text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-lg-6 col-md-6 col-12 mb-2">
                            <label for="" class="fw-bold">Phone:</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}"
                                placeholder="Enter Your Phone">
                            @error('phone')
                                <small class="fw-bold text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="row justify-content-center mt-2">
                            <div class="col-lg-4 text-center">
                                <button class = "btn btn-color">Register</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </form>

    </div>
@endsection
