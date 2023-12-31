@extends('admin.layouts')
@section('title', 'Student')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center mt-2 mb-2">
                <h2>All Students <span><a class="float-end btn btn-color mt-1" href="{{ route('admin.student.index') }}" class="btn btn-primary">Add</a></span></h2>
            </div>
            @if (session('msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ session('msg') }}</strong>
                </div>

            @endif
            <div class="table-responsive">

                <table class="table table-striped table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Session</th>
                            <th>Roll</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($student as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->session }}</td>
                                <td>{{ $item->roll }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>
                                    <a class = "btn btn-danger" href = {{ route('admin.student.delete', $item->id) }}>Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $student->render('pagination::bootstrap-5') }}
    </div>
@endsection
