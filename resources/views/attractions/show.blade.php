@extends('layouts.master')

@section('content')
    <div id="galaxyBanner" class="detail_banner">
        <div class="container">
            <div class="col-xs-12 text-center" id="detail_name">
                <h2>{{ $attraction->name }}</h2>
            </div>

            <div class="row" id="detail">
                <div class="col-xs-7">
                    <img src="<?php echo asset('img/attractions/'.$attraction->id.'.jpg')?>" />
                </div>

                <div class="col-xs-5" id="detail_description">
                    <h2>
                        Description
                    </h2>
                    <p>
                        {{ $attraction->description }}
                    </p>
                </div>

                <div class="col-xs-5">
                    <p class="detail_info text-center">
                        Rating: 50%(static)
                    </p>
                    <p class="detail_info text-center">
                        {{ $attraction->genre->name }}
                    </p>
                    <p class="detail_info text-center">
                        Attraction
                    </p>
                </div>

                <div class="col-xs-3 return-button">
                    <a class="btn btn-default" href="{{ URL::previous() }}"><i class="glyphicon glyphicon-arrow-left"></i>   Return to activities</a>
                </div>

                @if (Session::has('parkplan') && Auth::check())
                    <div class="ppl_add_button">
                        <a class="btn btn-default btn-green-default" onclick="event.preventDefault();document.getElementById('add-att-ppl-form').submit();" href="{{ @url('/account/parkplans/'.Session::get('parkplan').'/attractions/'.$attraction->id) }}">
                            <i class="glyphicon glyphicon-plus"></i> Add to plan
                        </a>
                    </div>

                    <form id="add-att-ppl-form" action="{{ @url('/account/parkplans/'.Session::get('parkplan').'/attractions/'.$attraction->id) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
