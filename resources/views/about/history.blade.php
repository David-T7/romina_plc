@extends('layouts/mainlayout')

@section('page-css')
@endsection

@section('page-content')

@include('partials.page-hero', [
    'label' => 'OUR HISTORY',
    'title' => 'Since 1973,<br><span>built on warmth and trust.</span>',
    'text'  => 'What began as a small, cherished restaurant in 4 Kilo has grown into a diversified Ethiopian group spanning hospitality, coffee export, trading and distribution.',
    'image' => 'images/stock/coffee-ceremony.webp',
])

@include('partials.about-story')

@endsection

@section('page-js')
@endsection
