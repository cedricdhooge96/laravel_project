@extends('layouts.master')

@section('content')
    <div id="galaxyBanner" class="admin_banner">
        <div class="container" id="admin_box">
            <div class="col-xs-12 text-center">
                <h2 style="margin-top: 4rem;">Admin Panel</h2>
            </div>

            <div id="admin_panel">
                {{-- <a href="{{ @url('/admin/reviews') }}" class="col-xs-6 admin-col">
                    <i class="glyphicon glyphicon-list-alt"></i>
                    <h3>Reviews Module</h3>
                </a> --}}

                <a href="{{ @url('/admin/attractions') }}" class="col-xs-6 admin-col">
                    <i class="glyphicon glyphicon-list-alt"></i>
                    <h3>Attractions Module</h3>
                </a>
            </div>
        </div>
    </div>
@endsection
