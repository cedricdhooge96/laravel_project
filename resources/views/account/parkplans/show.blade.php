@extends('layouts.master')

@section('content')
    <div id="galaxyBanner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{ @url('account') }}">
                        <img id="profile_picture"
                             src='{{ @asset('/img/accounts/'.$parkplan->user->id.'.jpg') }}'
                             onerror='this.onerror=null; this.src="{{ @asset('/img/accounts/dummy.jpg') }}"'
                             alt="Alternate Text">
                    </a>

                    <h2 id="profile_name">Parkplan: {{ $parkplan->name }}</h2>

                    <div id="profile_buttons">
                        <a href='{{ @url('/account/parkplans/') }}'
                           onclick="event.preventDefault();document.getElementById('destroy-ppl-form').submit();"
                           id="profile_settings"
                           class="btn btn-default">
                           <i class="glyphicon glyphicon-remove"></i>Delete plan
                        </a>
                        <form id="destroy-ppl-form" action="{{ @url('/account/parkplans/'.$parkplan->id) }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row" id="ppl_activities">
                @if(count($parkplan->attractions->all()))
                    <section class="col-xs-12">
                        <a class="btn btn-info btn-green-default" id="btn_ppl_activities" onclick="event.preventDefault();document.getElementById('add-form').submit();" href="{{ @url('/account/parkplans/'.$parkplan->id.'/activate') }}">Add more activities</a>
                    </section>
                @endif

                @forelse ($parkplan->attractions->all() as $attraction)
                    <div class="col-xs-4 ppl_activities">
                        <a class="picture-link" href="{{ @url('/attractions/' . $attraction->id) }}">
                          <img src="{{ @asset('img/attractions/'.$attraction->id.'.jpg') }}"></img>
                        </a>

                        <h3 class="activities_header">
                            {{ $attraction->name }}
                        </h3>

                        <a class="btn btn-info" href="{{ @url('/attractions/' . $attraction->id) }}">View {{ $attraction->name }}</a>
                        <a class="btn btn-info" onclick="event.preventDefault();document.getElementById('destroy-form-{{$attraction->id}}').submit();" href="#">Remove from parkplan</a>
                        <form id="destroy-form-{{$attraction->id}}" action="{{ @url('/account/parkplans/'.$parkplan->id.'/attractions/'.$attraction->id) }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                    </div>
                @empty
                    <div class="alert alert-info" id="alerties" role="alert">You have no activities in your park plan</div>
                    <a class="btn btn-info btn-green-default" id="btn_no_activities" onclick="event.preventDefault();document.getElementById('add-form').submit();" href="{{ @url('/account/parkplans/'.$parkplan->id.'/activate') }}">Add them now</a>
                @endforelse

                <form id="add-form" action="{{ @url('/account/parkplans/'.$parkplan->id.'/activate') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
        </div>
    </div>
@endsection
