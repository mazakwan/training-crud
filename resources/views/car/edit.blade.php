@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Car Edit') }}</div>

                <div class="card-body">
                    <form action="{{ route('update:car',$car->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="model">Model</label>
                            <input type="text" name="model" class="form-control" value="{{ $car->model }}">
                        </div>
                        <div class="form-group">
                            <label for="plate_number">Plate Number</label>
                            <textarea type="text" name="plate_number" class="form-control">{{ $car->plate_number }}</textarea>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Update New Car</button>
                            <a class="btn btn-link" href="{{ route('index:car') }}">back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
