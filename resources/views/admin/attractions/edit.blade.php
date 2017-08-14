@extends('layouts.master')

@section('content')
    <div id="galaxyBanner" class="admin_banner">
        <div class="container" id="admin_box_reviews">
            <div class="col-xs-12 text-center">
                <a href="{{ URL::previous() }}" class="btn-green-default return_admin"><i class="glyphicon glyphicon-arrow-left"></i>Return to activities</a>
                <h2 style="margin-top: 4rem;">Admin Panel - Update attraction</h2>
            </div>

            <div class="col-md-6 col-xs-12" id="admin_activity_box">
                {!! Form::open(['url' => ('/admin/attractions/'.$attraction->id), 'files' => true, 'method' => 'PUT']) !!}
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

                    <div class="form-group name-add">
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', $attraction->name, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', 'Description:') !!}
                        {!! Form::textarea('description', $attraction->description, ['class' => 'form-control', 'rows' => '4']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('genres_id', 'Genres:') !!}
                        {!! Form::select('genres_id', $genres, $attraction->genres_id,  ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('image', 'Picture:') !!}
                        {!! Form::file('image') !!}
                    </div>

                    <button type="submit" id="login_button" class="btn btn-default">Update attraction</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
