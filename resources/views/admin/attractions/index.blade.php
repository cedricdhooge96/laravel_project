@extends('layouts.master')

@section('content')
    <div id="galaxyBanner" class="admin_banner">
        <div class="container" id="admin_box_reviews">
            <div class="col-xs-12 text-center">
                <a href="{{ @url('/admin') }}" class="btn-green-default return_admin"><i class="glyphicon glyphicon-arrow-left"></i>Return to panel</a>
                <a href="{{ @url('/admin/attractions/create') }}" class="btn-green-default add_activity_admin"><i class="glyphicon glyphicon-plus"></i>Add new activity</a>
                <h2 style="margin-top: 4rem;">Admin Panel - Attractions</h2>
            </div>

            <div id="admin_panel">
                <form action="{{ @url('/admin/attractions') }}" method="GET" class="form-group col-xs-5 search_box">
                    <input type="text" name="search" value="{{ $search }}" class="form-control" id="txt_act_search" placeholder="Search activities" />
                    {{ csrf_field() }}
                    <button type="submit" class="btn-green-default">Search</button>
                </div>
                <table class="table admin_table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Genre</th>
                            <th>Rating</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attractions as $attraction)
                            <tr>
                                <td>{{ $attraction->name }}</td>
                                <td>{{ $attraction->genre->name }}</td>
                                <td>NA</td>
                                <td class="no-padding"><a class="btn-success" href="{{ @url('admin/attractions/'. $attraction->id.'/edit') }}">Modify</a></td>
                                <td class="no-padding"><a class="btn-danger" onclick="event.preventDefault();document.getElementById('destroy-form').submit();" href="{{ @url('admin/attractions/destroy/' . $attraction->id) }}">Delete</a></td>

                                <form id="destroy-form" action="{{ @url('admin/attractions/' . $attraction->id) }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-center col-xs-12">
                    <div class="pagination-lg">
                        {{ $attractions->appends(Request::except('page'))->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
