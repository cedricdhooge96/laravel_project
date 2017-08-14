@extends('layouts.master')

@section('content')
  <div id="galaxyBanner" class="box-fix">
      <div class="container">
          <div class="row">
              <div id="login_box">
                  <div id="login_box_header">
                      <h2>
                          Login
                      </h2>
                  </div>
                  <div id="login_box_content">
                        @if (count($errors))
                          <ul class="alert alert-danger">
                              @foreach ($errors->all() as $error)
                                  <li>
                                      {{ $error }}
                                  </li>
                              @endforeach
                          </ul>
                        @endif


                        {!! Form::open(['url' => '/login', 'method' => 'POST']) !!}
                          <div class="form-group">
                              <label>
                                  Email address
                              </label>
                              {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'name_filter', 'placeholder' => 'Search by name..']) !!}
                          </div>

                          <div class="form-group">
                              <label>
                                  Password
                              </label>
                              {!! Form::password('password', ['class' => 'form-control', 'id' => 'name_filter']) !!}
                          </div>

                          <button type="submit" id="login_button" class="btn btn-default">Login</button>
                        {!! Form::close() !!}
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
