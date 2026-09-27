@extends('layouts/mainlayout')

@section('page-css')
@endsection

@section('page-content')

@include('partials.page-hero', [
    'label' => 'OUR HISTORY',
    'title' => 'Since 1973,<br><span>built on warmth and trust.</span>',
    'text'  => 'What began as a small, cherished restaurant in Arat Kilo has grown into a diversified Ethiopian group spanning hospitality, coffee export, trading and distribution.',
    'image' => 'images/about/romina-history.jpg',
])

@include('partials.about')

@endsection

@section('page-js')
@endsection
