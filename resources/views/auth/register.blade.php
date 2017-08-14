@extends('layouts.master')

@section('content')
  <div id="galaxyBanner" class="box-fix">
      <div class="container">
          <div class="row">
              <div id="login_box">
                  <div id="login_box_header">
                      <h2>
                          Register
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

                      {!! Form::open(['url' => '/register', 'method' => 'POST']) !!}
                          <div class="clearfix">
                            <div class="form-group" style="width: 49%; margin-right: 2%; margin-bottom: 0.5rem; float: left;">
                                <label>
                                    First name
                                </label>
                                {!! Form::text('first_name', null, ['class' => 'form-control', 'id' => 'name_filter', 'placeholder' => 'Vb. Jonny']) !!}
                            </div>

                            <div class="form-group" style="width: 49%; float: left; margin-bottom: 0.5rem;">
                                <label>
                                    Last name
                                </label>
                                {!! Form::text('last_name', null, ['class' => 'form-control', 'id' => 'name_filter', 'placeholder' => 'Vb. Cash']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                              <label>
                                  Email address
                              </label>
                              {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'name_filter', 'placeholder' => 'Vb. test@hotmail.com']) !!}
                          </div>

                          <div class="form-group">
                              <label>
                                  Password
                              </label>
                              {!! Form::password('password', ['class' => 'form-control', 'id' => 'name_filter']) !!}
                          </div>

                          <div class="form-group">
                              <label>
                                  Verify your password
                              </label>
                              {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'name_filter']) !!}
                          </div>

                          <button type="submit" id="login_button" class="btn btn-default">Register</button>
                      {!! Form::close() !!}

                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
