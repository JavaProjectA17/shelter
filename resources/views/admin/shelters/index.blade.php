@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Shelters Table</h3>
                        <a href="{{ route('admin.shelters.index') }}">
                            Reset sorting
                        </a>
                    </div>
                    {{--<ul class="nav nav-tabs">--}}
                        {{--<li class="nav-item @if ($active == 'all') active @endif"><a class="nav-link" href="{{ route('admin.shelters.index') }}">All</a></li>--}}
                        {{--<li class="nav-item @if ($active == 'waiting') active @endif"><a class="nav-link" href="{{ route('admin.shelters.waiting_to_approve') }}">Waiting to approve</a></li>--}}
                        {{--<li class="nav-item @if ($active == 'approved') active @endif"><a class="nav-link" href="{{ route('admin.shelters.approved') }}">Approved</a></li>--}}
                    {{--</ul>--}}

                    <div class="panel-body">
                        @if (session('message'))
                            <div class="alert alert-info">{{ session('message') }}</div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>
                                    Name
                                    <a href="{{ route('admin.shelters.index', ['nameshelter' => request('nameshelter'), 'sortByName' => 'asc']) }}">
                                        <img src="/admin/images/down.png" width="13" height="13" alt="По убыванию">
                                    </a>
                                    <a href="{{ route('admin.shelters.index', ['nameshelter' => request('nameshelter'), 'sortByName' => 'desc']) }}">
                                        <img src="/admin/images/up.png" width="13" height="13" alt="По возростанию">
                                    </a>
                                </th>
                                <th>
                                    User ID
                                    <a href="{{ route('admin.shelters.index', ['user_id' => request('user_id'), 'sortByUserId' => 'asc']) }}">
                                        <img src="/admin/images/down.png" width="13" height="13" alt="По убыванию">
                                    </a>
                                    <a href="{{ route('admin.shelters.index', ['user_id' => request('user_id'), 'sortByUserId' => 'desc']) }}">
                                        <img src="/admin/images/up.png" width="13" height="13" alt="По возростанию">
                                    </a>
                                </th>
                                <th>Description</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>
                                    Approve
                                    <a href="{{ route('admin.shelters.index', ['approve' => request('approve'), 'sortByApprove' => 'asc']) }}">
                                        <img src="/admin/images/down.png" width="13" height="13" alt="По убыванию">
                                    </a>
                                    <a href="{{ route('admin.shelters.index', ['approve' => request('approve'), 'sortByApprove' => 'desc']) }}">
                                        <img src="/admin/images/up.png" width="13" height="13" alt="По возростанию">
                                    </a>
                                </th>
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
                                        @if($shelter->approve)
                                            {{ Form::submit('Approved', ['class' => 'btn btn-success']) }}
                                        @else
                                            {{ Form::submit('Waiting to Approve', [ 'class' => 'btn']) }}
                                        @endif

                                        {{--{{ Form::submit('Approve', [ 'class' => ($shelter->approve ? 'btn btn-success' : 'btn') ]) }}--}}
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