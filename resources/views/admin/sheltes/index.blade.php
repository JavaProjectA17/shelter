@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Shelters</div>

                    <div class="panel-body">
                        @if (session('message'))
                            <div class="alert alert-info">{{ session('message') }}</div>
                        @endif
                        {{--@can('create', \App\Animal::class)--}}
{{--                            <a href="{{ route('admin.animals.create') }}" class="btn btn-default">Add New Pet</a>--}}
                            {{--<br /><br />--}}
                        {{--@endcan--}}
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Shelter Name</th>
                                <th>User ID</th>
                                <th>Description</th>
                                <th>Address</th>
                                <th>Phone</th>
                                {{--@can('update', \App\Animal::class)--}}
                                <th>Approve</th>
                                {{--@endcan--}}
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($shelters as $shelter)
                                <tr>
                                    <td>{{ $shelter->name_shelter }}</td>
                                    <td>{{ $shelter->user_id }}</td>
                                    <td>{{ $shelter->description }}</td>
                                    <td>{{ $shelter->address }}</td>
                                    <td>{{ $shelter->phone }}</td>
                                    {{--@can('update', \App\Animal::class)--}}
                                    <td>
                                        {{--<a href="{{ route('admin.shelters.edit', $shelter->id) }}" class="btn btn-default">Approve</a>--}}
                                    </td>
                                    {{--@endcan--}}
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No entries found.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $shelters->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection