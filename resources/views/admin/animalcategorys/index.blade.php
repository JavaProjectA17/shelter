@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Category of animals</div>

                    <div class="panel-body">
                        @if (session('message'))
                            <div class="alert alert-info">{{ session('message') }}</div>
                        @endif
                        <a href="{{ route('admin.animalcategorys.create') }}" class="btn btn-default">Add New Kind</a>
                        <br /><br />
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Kind of animal</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($animalcategorys as $animalcategory)
                                <tr>
                                    <td>{{ $animalcategory->title }}</td>
                                    <td>
                                        <a href="{{ route('admin.animalcategorys.edit', $animalcategory->id) }}" class="btn btn-default">Edit</a>
                                        <form action="{{ route('admin.animalcategorys.destroy', $animalcategory->id) }}" method="POST"
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
                        {{ $animalcategorys->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection