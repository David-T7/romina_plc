@extends('layouts/mainlayout')

@section('page-css')
@endsection

@section('page-content')

@include('partials.hero')

@include('partials.about')

@include('partials.who-we-are')

@include('partials.portfolio')

@include('partials.values')

@include('partials.brands-tabs')

@include('partials.coffee')

{{-- Hidden for now — kept for future use.
@include('partials.businesses')
--}}

@include('partials.news')

@include('partials.partners')

@include('partials.careers')

@include('partials.contact')

@include('partials.find-us')

@endsection

@section('page-js')
@endsection
