@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Car Show') }}</div>

                <div class="card-body">
                    <form action="" method="">
                        @csrf
                        <div class="form-group">
                            <label for="title">Model</label>
                            <input type="text" name="model" class="form-control" value="{{ $car->model }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="plate_number">Plate Number</label>
                            <textarea type="text" name="plate_number" class="form-control" readonly>{{ $car->plate_number }}</textarea>
                        </div>
                        @if ($car->attachment)
                        <div class="form-group">
                            <label for="attachment">Attachment (if any)</label>
                            <a target="_blank" class="btn btn-secondary" href="{{ asset('storage/'.$car->attachment) }}">Open this attachment: {{ $car->attachment }}</a>
                        </div>
                        @endif
                        <div>
                            <a class="btn btn-link" href="{{ route('index:car') }}">back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
