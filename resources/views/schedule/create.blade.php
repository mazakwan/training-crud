@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Schedule Create') }}</div>

                <div class="card-body">
                    <form action="{{ route('store:schedule') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" name="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="attachment">Attachment</label>
                            <input type="file" name="attachment" class="form-control">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Create New Schedule</button>
                            <a class="btn btn-link" href="{{ route('index:schedule') }}">back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
