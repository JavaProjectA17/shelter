@extends('layouts.app')
@section('links')
  @include('main.contacts.links')
@endsection
@section('content')
  <div class="content pt1">
    <div class="container_12">
    @include('main.contacts.info')
    @include('main.contacts.form')
    </div>
  </div>
@endsection
