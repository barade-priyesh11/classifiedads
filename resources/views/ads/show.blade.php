@extends('layouts.app')

@section('title', $ad->title)

@section('content')
    <h1>{{ $ad->title }}</h1>

    <p><strong>Price:</strong> ${{ $ad->price }}</p>
    <p><strong>Location:</strong> {{ $ad->location }}</p>
    <p>{{ $ad->description }}</p>

    <hr>

    <h3>Posted by: {{ $ad->user->name }}</h3>

    <a href="{{ url('/ads') }}">Back to Ads</a>
@endsection
