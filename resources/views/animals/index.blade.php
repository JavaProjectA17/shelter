@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Animals</div>

                    <div class="panel-body">
                        @if (session('message'))
                            <div class="alert alert-info">{{ session('message') }}</div>
                        @endif
                        <a href="{{ route('animals.create') }}" class="btn btn-default">Add New Pet</a>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Pet name</th>
                                <th>Image</th>
                                <th>About</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($animals as $animal)
                                <tr>
                                    <td>{{ $animal->name }}</td>
                                    <td>{{ $animal->image }}</td>
                                    <td>{{ $animal->about }}</td>
                                    <td>
                                        <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-default">Edit</a>
                                        <form action="{{ route('animals.destroy', $animal->id) }}" method="POST"
                                              style="display: inline"
                                              onsubmit="return confirm('Are you sure?');">
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
                        {{ $animals->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection