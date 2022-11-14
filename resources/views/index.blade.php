@extends('master')

@section('content')
<div class="container">
    <div class="rows">
        <div class="card shadow-sm mt-5">
        <h5 class="card-header">Welcome to the weather app</h5>
        <div class="card-body">
            <p>Welcome to this simple weather app.</p>
            <p>Use the search bar above to view the forecast for a specific location.</p>
            <p><a href="{{ route('mailinglist.subscribe') }}">Subscribe</a> to receive continuous weather forecasts in the morning via email.</p>
        </div>
    </div>
</div>
@endsection