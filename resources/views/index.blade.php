@extends('master')

@section('content')
<div class="container">
    <div class="rows">
        <div class="card shadow-sm mt-5">
            <h5 class="card-header">View at a forecast</h5>
            <div class="card-body">
                <form class="form-inline" method="GET" action="{{ route('forecast') }}">
                    <div class="input-group">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="location" id="location">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card shadow-sm mt-5">
            <h5 class="card-header">Welcome to the weather app</h5>
            <div class="card-body">
                <p>Welcome to this simple weather app.</p>
                <p>Use the search bar above to view the forecast for a specific location.</p>
                <p><a href="{{ route('mailinglist.subscribe') }}">Subscribe</a> to receive continuous weather forecasts in the morning via email.</p>
            </div>
        </div>
    </div>
</div>
@endsection