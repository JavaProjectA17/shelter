@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">News</div>

                    <div class="panel-body">
                        @if (session('message'))
                            <div class="alert alert-info">{{ session('message') }}</div>
                        @endif

                            <a href="{{ route('admin.novelties.create') }}" class="btn btn-default">Add News</a>
                            <br /><br />

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Short description</th>
                                <th>Description</th>
                                <th>Date of publication</th>
                                <th>Actions</th>
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
                                    <td>{{ $novelty->start }}</td>
                                    <td>
                                        <a href="{{ route('admin.novelties.edit', $novelty->id) }}" class="btn btn-default">Edit</a>

                                            <form action="{{ route('admin.novelties.destroy', $novelty->id) }}" method="POST" style="display: inline" onsubmit="return confirm('Are you sure?');">
                                            <input type="hidden" name="_method" value="DELETE">
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger">Delete</button>
                                            </form>
                                    </td>
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