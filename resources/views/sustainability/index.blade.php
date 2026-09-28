@extends('layouts/mainlayout')

@section('page-css')
@endsection

@section('page-content')

@include('partials.page-hero', [
    'label' => 'SUSTAINABILITY',
    'crumb' => 'Sustainability',
    'title' => 'Growth with<br><span>purpose.</span>',
    'text'  => 'We believe successful businesses should create positive impact while delivering sustainable, long-term growth, for our farmers, our communities and the land that sustains them.',
    'image' => 'images/hero/hero-03.jpg',
])

@include('partials.sustainability')

@endsection

@section('page-js')
@endsection
