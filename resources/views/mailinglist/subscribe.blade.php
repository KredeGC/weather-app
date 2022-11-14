@extends('master')

@section('content')
<div class="container">
    @include('partials.alert')
    <div class="col-6 offset-3">
        <div class="card shadow-sm mt-5">
            <h5 class="card-header">Subscribe to mailing list</h5>
            <div class="card-body">
                <form method="POST" action="{{ route('mailinglist.subscribe') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                        @if($errors->has('name'))
                            <div class="text-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="mail" class="form-label">Email</label>
                        <input type="text" class="form-control" name="mail" id="mail" value="{{ old('mail') }}">
                        @if($errors->has('mail'))
                            <div class="text-danger">{{ $errors->first('mail') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" name="location" id="location" value="{{ old('location') }}">
                        @if($errors->has('location'))
                            <div class="text-danger">{{ $errors->first('location') }}</div>
                        @endif
                    </div>
                    <input type="submit" class="btn btn-primary" value="Subscribe" />
                </form>
            </div>
        </div>
    </div>
</div>
@endsection