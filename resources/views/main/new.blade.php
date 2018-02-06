@extends('layouts.app')
@section('links')
  @include('main.new.links')
@endsection
@section('content')

  <div class="content pt1">
    <div class="container_12">

        @include('main.new.new')

      <div class="grid_4 prefix_1">

        @include('main.new.categories')
        @include('main.new.post')

      </div>
    </div>
  </div>
@endsection
