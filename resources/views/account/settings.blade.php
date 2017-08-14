@extends('layouts.master')

@section('content')
    <div id="galaxyBanner" class="banner_fix">
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

        <div class="container" id="settings_box" >
            <div class="box_header">
                <h3>Change profile settings</h3>
            </div>
            {!! Form::open(['url' => ('/account/update'), 'files' => true, 'method' => 'PUT']) !!}
                @if (count($errors))
                  <ul class="alert alert-danger">
                      @foreach ($errors->all() as $error)
                          <li>
                              {{ $error }}
                          </li>
                      @endforeach
                  </ul>
                @endif

                {!! Form::hidden('id') !!}

                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('first_name', 'First name:') !!}
                    {!! Form::text('first_name', $user->first_name, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('last_name', 'Last name:') !!}
                    {!! Form::text('last_name', $user->last_name, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('image', 'Profile picture:') !!}
                    {!! Form::file('image') !!}
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default btn-green-default" id="settings_btn">Submit changes</button>
                </div>

        </div>
    </div>
@endsection
