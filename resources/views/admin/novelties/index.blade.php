{{--@extends('admin.app')--}}

{{--@section('content')--}}


{{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-8 col-md-offset-2">--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading">Moderating news</div>--}}

                    {{--<div class="panel-body">--}}
                        {{--@if (session('message'))--}}
                            {{--<div class="alert alert-info">{{ session('message') }}</div>--}}
                        {{--@endif--}}
                       {{----}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}


{{--@endsection--}}

@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">News</div>

                    <div class="panel-body">
                        @if (session('message'))
                            <div class="alert alert-info">{{ session('message') }}</div>
                        @endif
{{--                        @can('create', \App\Animal::class)--}}
                            <a href="{{ route('admin.novelties.create') }}" class="btn btn-default">Add News</a>
                            <br /><br />
                        {{--@endcan--}}
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Short description</th>
                                <th>Description</th>
{{--                                @can('update', \App\Animal::class)--}}
                                    <th>Actions</th>
                                {{--@endcan--}}
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($novelties as $novelty)
                                <tr>
                                    <td>{{ $novelty->title }}</td>
                                    <td>
                                        <img class="img-circle img-responsive img-thumbnail" style="max-width: 70px;" src="{{ $novelty->image }}">
                                    </td>
                                    <td>{{ $novelty->short_description }}</td>
                                    <td>{{ $novelty->description }}</td>
                                    {{--@can('update', \App\Novelty::class)--}}
                                        {{--<td>--}}
                                            {{--<a href="{{ route('admin.novelties.edit', $novelty->id) }}" class="btn btn-default">Edit</a>--}}
{{--                                            @can('delete', \App\Novelty::class)--}}
                                                {{--<form action="{{ route('admin.novelties.destroy', $novelty->id) }}" method="POST"--}}
                                                      {{--style="display: inline"--}}
                                                      {{--onsubmit="return confirm('Are you sure?');">--}}
                                                    {{--<input type="hidden" name="_method" value="DELETE">--}}
                                                    {{--{{ csrf_field() }}--}}
                                                    {{--<button class="btn btn-danger">Delete</button>--}}
                                                {{--</form>--}}
                                            {{--@endcan--}}
                                        {{--</td>--}}
                                    {{--@endcan--}}
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No entries found.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $novelties->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection