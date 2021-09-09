@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session()->has('alert'))
            <div class="alert {{ session()->get('alert-type') }}" role="alert">
                {{ session()->get('alert') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Car Index') }}
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

                <div class="card-body">
                <table class="table">
                    <thead>
                        <th>No.</th>
                        <th>Model</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($cars as $car)
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $car->model }}</td>
                        <td>
                            <a type="button" class="btn btn-primary" href="{{ route('show:car',$car) }}">Show</a>
                            <a type="button" class="btn btn-success" href="{{ route('edit:car',$car) }}">Edit</a>
                            <a type="button" onclick="return confirm('Do you want to delete this entry?')" class="btn btn-danger" href="{{ route('destroy:car',$car) }}">Delete</a>
                            <hr>
                            <a type="button" onclick="return confirm('Do you want to delete this entry?')" class="btn btn-danger" href="{{ route('force:destroy:car',$car->id) }}">Force Delete</a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $cars->appends(['keyword'=> request()->get('keyword')])->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
