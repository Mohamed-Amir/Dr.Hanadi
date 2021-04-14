@extends('Fronted.layouts.master')

@section('title')
    Dr.Hanadi Yousif
    @endsection

@section('content')
    @include('Fronted.layouts.Home.about')
    @include('Fronted.Sections.homeSections')
    @include('Fronted.DrHanadi.latestVideo')
    @include('Fronted.layouts.Home.banners')
    @include('Fronted.Programs.homePrograms')
@endsection