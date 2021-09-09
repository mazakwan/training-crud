@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Schedule Edit') }}</div>

                <div class="card-body">
                    <form action="{{ route('update:schedule',$schedule->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $schedule->title }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" name="description" class="form-control">{{ $schedule->description }}</textarea>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Update New Schedule</button>
                            <a class="btn btn-link" href="{{ route('index:schedule') }}">back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
