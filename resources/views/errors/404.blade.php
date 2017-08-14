@extends('layouts.master')

@section('content')
    <div id="galaxyBanner">
        <div class="container">
            <div class="col-xs-12 text-center">
                <h2 style="margin-top: 4rem;">There is no page for the given URL</h2>
            </div>
        </div>
    </div>
    <div style="height: calc(100% - 114px); display: flex; align-items:center; justify-content: center;">
        <a style="padding: 3rem 10rem; font-size: 2rem;" class="btn btn-default btn-green-default" href="{{ @url('/') }}">Go to homepage</a>
    </div>
@endsection
