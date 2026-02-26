@extends('layouts.app')

@section('title', 'Case Studies')

@section('content')
    <div>
        @include('sections.casestudypagesection.casestudyherosection')
        @include('sections.casestudypagesection.studiesprojectssections')
        @include('sections.homepagesections.ctasection')


    </div>
@endsection
