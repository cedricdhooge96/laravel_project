@extends('layouts.master')

@section('content')
    <div id="galaxyBanner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{ @url('account') }}">
                        <img id="profile_picture"
                             src='{{ @asset('/img/accounts/'.$user->id.'.jpg') }}'
                             onerror='this.onerror=null; this.src="{{ @asset('/img/accounts/dummy.jpg') }}"'
                             alt="Alternate Text">
                    </a>
                    <h2 id="profile_name">{{ $user->first_name }} {{ $user->last_name }}</h2>

                    <div id="profile_buttons">
                        <a href="{{ @url('/account/settings') }}" id="profile_settings" class="btn btn-default"><i class="glyphicon glyphicon-cog"></i>Profile settings</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="profile_reviews">

        <a style="width: 47.5%;" class="profile_parkmap text-center" data-toggle="modal" data-target="#new_ppl_modal">
            <img class="picture" src="{{ @asset('/img/park_map.jpg') }}" />
            <p>New Parkplan</p>
        </a>

        <a style="width: 47.5%;" class="profile_parkmap text-center" data-toggle="modal" data-target="#show_ppl_modal">
            <img src="{{ @asset('/img/park_map.jpg') }}" />
            <p>My Parkplans</p>
        </a>
    </div>

    <!-- ADD PARKPLAN MODAL -->
<div class="modal fade" id="new_ppl_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Create a new parkplan</h4>
            </div>
            {!! Form::open(['url' => '/account/parkplans', 'method' => 'POST']) !!}
                <div class="modal-body" id="add_review_body">
                    @if (count($errors))
                      <ul class="alert alert-danger">
                          @foreach ($errors->all() as $error)
                              <li>
                                  {{ $error }}
                              </li>
                          @endforeach
                      </ul>
                    @endif

                    <div class="form-group">
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="modal-footer" id="add_review_footer">
                    <button type="submit" class="btn btn-default btn-green-default">Create parkplan</button>
                    <a class="btn btn-default btn-green-default" data-dismiss="modal">Close</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<!-- MY PARKPLAN MODAL -->
<div class="modal fade" id="show_ppl_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">My parkplans</h4>
            </div>
            <div class="modal-body">
                @foreach ($user->parkplans->all() as $parkplan)
                    <div class="friend_search">
                        <img src="{{ @asset('/img/park_map.jpg') }}" width="75" height="75">

                        <h3>
                            {{ $parkplan->name }}
                        </h3>

                        <a href='{{ @url("/account/parkplans/" . $parkplan->id) }}' class="btn btn-success btn-green-default btn_ppl_open">Open</a>
                    </div>
                @endforeach
            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-green-default" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>
@endsection
