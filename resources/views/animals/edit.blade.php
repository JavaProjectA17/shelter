@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Pet</div>

                    <div class="panel-body">
                        @if ($errors->count() > 0)
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{ route('animals.update', $animal->id) }}" method="post">
                            <input type="hidden" name="_method" value="PUT">
                            {{ csrf_field() }}
                            Pet name:
                            <br />
                            <input type="text" name="name" value="{{ $animal->name }}" />
                            <br /><br />
                            Pet Image:
                            <br />
                            <input type="text" name="image" value="{{ $animal->image }}" />
                            <br /><br />
                            About:
                            <br />
                            <input type="text" name="about" value="{{ $animal->about }}" />
                            <br /><br />
                            <input type="submit" value="Submit" class="btn btn-default" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection