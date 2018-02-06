@extends('layouts.app')
@section('links')
  @include('main.sections.links')
@endsection
@section('content')
  @include('main.sections.slider')
  @include('main.sections.welcome')
  @include('main.sections.adoption')
  @include('main.sections.careTips')

@endsection
