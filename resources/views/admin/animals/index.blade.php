@extends('admin.app')

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
                        @can('create', \App\Animal::class)
                            <a href="{{ route('admin.animals.create') }}" class="btn btn-default">Add New Pet</a>
                            <br /><br />
                        @endcan
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Pet name</th>
                                <th>Image</th>
                                <th>About</th>
                                @can('update', \App\Animal::class)
                                    <th>Actions</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($animals as $animal)
                                <tr>
                                    <td>{{ $animal->name }}</td>
                                    <td>{{ $animal->image }}</td>
                                    <td>{{ $animal->about }}</td>
                                    @can('update', \App\Animal::class)
                                    <td>
                                        <a href="{{ route('admin.animals.edit', $animal->id) }}" class="btn btn-default">Edit</a>
                                        @can('delete', \App\Animal::class)
                                        <form action="{{ route('admin.animals.destroy', $animal->id) }}" method="POST"
                                              style="display: inline"
                                              onsubmit="return confirm('Are you sure?');">
                                            <input type="hidden" name="_method" value="DELETE">
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                        @endcan
                                    </td>
                                    @endcan
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