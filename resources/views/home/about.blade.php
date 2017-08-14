@extends('layouts.master')

@section('content')
    <div id="galaxyBanner">
        <div class="container">
            <div class="col-xs-12 text-center">
                <h2 style="margin-top: 4rem;">About us</h2>
            </div>

            <div class="col-xs-4 about_col">
                <img class="about_img_col" src="{{ @asset('/img/cars.jpg') }}" />
                <h3>Pixaria</h3>
                <p>Pixaria is one of the theme parcs of the AdventureWorld group. The park is based on the animation movies from Pixar and is situated in Chakamaka</p>
                <a class="btn btn-default btn-green-default" href="#">Visit Pixaria</a>
            </div>

            <div class="col-xs-4 about_col">
                <img class="about_img_col" src="{{ @asset('/img/history.jpg') }}" />
                <h3>History Park</h3>
                <p>Return to the past in History World, where old legends and myths come back to life in a spectacular form. Beware of dinosaurs!</p>
                <a class="btn btn-default btn-green-default" href="#">Visit History Park</a>
            </div>

            <div class="col-xs-4 about_col">
                <img class="about_img_col" src="{{ @asset('/img/galaxy.jpg') }}" />
                <h3>Galaxy World</h3>
                <p>Travel trough space in Galaxy World. This park counts more then 20 attractions and is thereby our biggest theme parc yet!</p>
                <a class="btn btn-default btn-green-default" href="{{ @url('/') }}">Visit Galaxy World</a>
            </div>
        </div>
    </div>
@endsection
