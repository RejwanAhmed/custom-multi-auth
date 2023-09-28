@extends('admin.layouts')
@section('title', 'Student')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Session</th>
                            <th>Roll</th>
                            <th>Email</th>
                            <th>Phone</th>
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
