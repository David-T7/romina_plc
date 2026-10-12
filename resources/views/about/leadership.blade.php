@extends('layouts/mainlayout')

@section('page-css')
@endsection

@section('page-content')

@include('partials.page-hero', [
    'label' => 'OUR LEADERSHIP',
    'title' => 'Guided by Vision,<br><span>Led with Integrity.</span>',
    'text'  => 'Five decades of steady leadership have shaped Romina Group, from a single family restaurant to a diversified enterprise built on excellence, quality and trust.',
    'image' => 'images/news/tafo-2.webp',
])

@include('partials.executive-team', ['extendedTeam' => true])

@endsection

@section('page-js')
@endsection
