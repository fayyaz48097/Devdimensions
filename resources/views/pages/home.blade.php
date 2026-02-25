@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div>
        @include('sections.homepagesections.herosection')
        @include('sections.homepagesections.marqueesection')
        @include('sections.homepagesections.findtalent')
        @include('sections.homepagesections.welcomesection')
        @include('sections.homepagesections.portfoliosection')
        @include('sections.homepagesections.ourprocesssection')
        @include('sections.homepagesections.hireussection')
        @include('sections.homepagesections.ourclientsection')
        @include('sections.homepagesections.testimonialsection')
        @include('sections.homepagesections.faqsection')
        @include('sections.homepagesections.ctasection')


    </div>
@endsection
