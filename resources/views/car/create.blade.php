@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Car Create') }}</div>

                <div class="card-body">
                    <form action="{{ route('store:car') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="model">Model</label>
                            <input type="text" name="model" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="plate_number">Plate Number</label>
                            <input type="text" name="plate_number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="attachment">Attachment</label>
                            <input type="file" name="attachment" class="form-control">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Create New Schedule</button>
                            <a class="btn btn-link" href="{{ route('index:car') }}">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
