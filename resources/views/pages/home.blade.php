@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div>
        @include('sections.homepagesections.herosection')
        @include('sections.homepagesections.marqueesection')


    </div>
@endsection
