@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <div class="panel panel-default">
                    <ul class="nav nav-tabs">
                        <li class="nav-item @if ($active == 'all') active @endif"><a class="nav-link" href="{{route('admin.shelters.index')}}">All</a></li>
                        <li class="nav-item @if ($active == 'waiting') active @endif"><a class="nav-link" href="{{route('admin.shelters.waiting_to_approve')}}">Waiting to approve</a></li>
                        <li class="nav-item @if ($active == 'approved') active @endif"><a class="nav-link" href="{{route('admin.shelters.approved')}}">Approved</a></li>
                    </ul>

                    <div class="panel-body">
                        @if (session('message'))
                            <div class="alert alert-info">{{ session('message') }}</div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Shelter Name</th>
                                <th>User ID</th>
                                <th>Description</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Approve</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($shelters as $shelter)
                                <tr>
                                    <td>{{ $shelter->nameshelter }}</td>
                                    <td>{{ $shelter->user_id }}</td>
                                    <td>{{ $shelter->description }}</td>
                                    <td>{{ $shelter->address }}</td>
                                    <td>{{ $shelter->phone }}</td>
                                    <td>
                                        {{ Form::open(array('url' => 'admin/' . $shelter->id . '/active')) }}
                                        {{ Form::submit('Approve', [ 'class' => ($shelter->approve ? 'btn btn-success' : 'btn') ]) }}
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No entries found.</td>
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