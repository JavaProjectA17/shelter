@extends('admin.app')

@section('content')


<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Moderating news</div>

                    <div class="panel-body">
                        @if (session('message'))
                            <div class="alert alert-info">{{ session('message') }}</div>
                        @endif
                       
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection