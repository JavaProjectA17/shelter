@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Kind of animals</div>

                    <div class="panel-body">
                        @if (session('message'))
                            <div class="alert alert-info">{{ session('message') }}</div>
                        @endif
                        <a href="{{ route('kind_of_animals.create') }}" class="btn btn-default">Add New Kind</a>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Kind of animal</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($kind_of_animals as $kind_of_animal)
                                <tr>
                                    <td>{{ $kind_of_animal->kind_of_the_animal }}</td>
                                    <td>
                                        <a href="{{ route('kind_of_animals.edit', $kind_of_animal->id) }}" class="btn btn-default">Edit</a>
                                        <form action="{{ route('kind_of_animals.destroy', $kind_of_animal->id) }}" method="POST"
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
                        {{ $kind_of_animals->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection