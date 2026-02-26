@extends('layouts.app')

@section('title', 'About Us')


@section('content')
    <div>
        @include('sections.aboutuspagesection.aboutherosection')
        @include('sections.aboutuspagesection.whatwesection')
        @include('sections.aboutuspagesection.corevaluesection')
        @include('sections.aboutuspagesection.joinnowsection')



    </div>
@endsection
