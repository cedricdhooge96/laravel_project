@extends('layouts.master')

@section('content')
  <div id="galaxyBanner">
      <div class="container">
          <div class="col-xs-12 text-center">
              <h2>Attractions</h2>
          </div>

          <div class="row" id="filters">
              {!! Form::open(array('url' => 'attractions', 'method' => 'GET')) !!}
                  <div class="col-xs-4">
                      {!! Form::label('search', 'Name:', ['class' => 'filter_label']) !!}
                      {!! Form::text('search', $search, ['class' => 'form-control', 'id' => 'name_filter', 'placeholder' => 'Search by name..']) !!}
                  </div>

                  <div class="col-xs-4">
                      <label class="filter_label">
                          Genres:
                      </label>
                      {!! Form::select('genre', $genres, $genre,  ['class' => 'form-control', 'placeholder' => 'All genres']) !!}
                  </div>

                  {!! Form::token() !!}

                  <div class="col-xs-4">
                    {!! Form::submit('Search', ['class' => 'btn btn-info', 'id' => 'searchBTN']) !!}
                  </div>
              {!! Form::close() !!}

              <div class="text-center col-xs-12">
                  <div class="pagination-lg">
                    {{ $attractions->appends(Request::except('page'))->render() }}
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="container">

      {{-- <ol class="breadcrumb">
          <li class="active">Activities</li>
      </ol> --}}

      <div class="row" id="activities_list">

          @forelse ($attractions as $attraction)
              <div class="col-xs-4 activities">
                  <a class="picture-link" href="{{ @url('/attractions/' . $attraction->id) }}">
                    <img src="<?php echo asset('img/attractions/'.$attraction->id.'.jpg')?>"></img>
                  </a>
                  <h3 class="activities_header">
                      {{ $attraction->name }}
                  </h3>

                  <p class="activities_genre" style="">
                    <strong>Genre:</strong>{{ $attraction->genre->name }}
                  </p>

                  <div class="activities_rating">
                      <span>Rating: </span>

                      <div class="bar" style="">
                          <div class="progression text-center" style="width: 70%;">
                              <strong>70% (static)</strong>
                          </div>
                      </div>
                  </div>

                  <p class="activities_description">{{ $attraction->description }}</p>

                  <a class="btn btn-info" href="{{ @url('/attractions/'.$attraction->id) }}">Detail</a>
              </div>
          @empty
            <p id="no results">There are no attractions to show!!</p>
          @endforelse

          <div class="col-xs-12 text-center">
              <div class="pagination-lg">
                  {{ $attractions->appends(Request::except('page'))->render() }}
              </div>
          </div>
      </div>
  </div>
@endsection
