@extends('admin.layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('alert'))
                <div class="alert {{ session()->get('alert-type') }}" role="alert">
                    {{ session()->get('alert') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="row">
                    {{ __('Schedule Index') }}

                    <div class="float-right">
                        <form action="" method="">
                            <div class="input-group">
                                <input class="form-control" name="keyword" type="text" value="{{ request()->get('keyword') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>

                <div class="card-body">
                <table class="table">
                    <thead>
                        <th>No.</th>
                        <th>Title</th>
                        <th>User (Creator)</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($schedules as $schedule)
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $schedule->title }}</td>
                        <td>{{ $schedule->user->name }}</td>
                        <td>
                            <a type="button" class="btn btn-primary" href="{{ route('show:schedule',$schedule->id) }}">Show</a>
                            <a type="button" class="btn btn-success" href="{{ route('edit:schedule',$schedule->id) }}">Edit</a>
                            <a type="button" onclick="return confirm('Do you want to delete this entry?')" class="btn btn-danger" href="{{ route('destroy:schedule',$schedule->id) }}">Delete</a>
                            <hr>
                            <a type="button" onclick="return confirm('Do you want to delete this entry?')" class="btn btn-danger" href="{{ route('force:destroy:schedule',$schedule->id) }}">Force Delete</a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                {{ $schedules->appends(['keyword'=> request()->get('keyword')])->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
