@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Schedule Show') }}</div>

                <div class="card-body">
                    <form action="" method="">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $schedule->title }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" name="description" class="form-control" readonly>{{ $schedule->description }}</textarea>
                        </div>
                        @if ($schedule->attachment)
                            <div class="form-group">
                                <label for="attachment">Attachment</label>
                                <a target="_blank" class="btn btn-secondary" href="{{ asset('storage/'.$schedule->attachment) }}">Open this attachment: {{ $schedule->attachment }}</a>
                            </div>
                        @endif

                        <div>
                            <a class="btn btn-link" href="{{ route('index:schedule') }}">back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
