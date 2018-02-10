@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Users Table</h3>
                        <a href="{{ route('admin.users.index') }}">
                            Reset sorting
                        </a>
                    </div>
                    <div class="panel-body">
                        @if (session('message'))
                            <div class="alert alert-info">{{ session('message') }}</div>
                        @endif
                        {{--<a href="{{ route('admin.users.create') }}" class="btn btn-default">Add New User</a>--}}
                        {{--<br /><br />--}}
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        Name
                                        <a href="{{ route('admin.users.index', ['name' => request('name'), 'sortByName' => 'asc']) }}">
                                            <img src="/admin/images/down.png" width="13" height="13" alt="По убыванию">
                                        </a>
                                        <a href="{{ route('admin.users.index', ['name' => request('name'), 'sortByName' => 'desc']) }}">
                                            <img src="/admin/images/up.png" width="13" height="13" alt="По возростанию">
                                        </a>
                                    </th>
                                    <th>
                                        Email
                                        <a href="{{ route('admin.users.index', ['email' => request('email'), 'sortByEmail' => 'asc']) }}">
                                            <img src="/admin/images/down.png" width="13" height="13" alt="По убыванию">
                                        </a>
                                        <a href="{{ route('admin.users.index', ['email' => request('email'), 'sortByEmail' => 'desc']) }}">
                                            <img src="/admin/images/up.png" width="13" height="13" alt="По возростанию">
                                        </a>
                                    </th>
                                    <th>
                                        Banned
                                        <a href="{{ route('admin.users.index', ['banned' => request('banned'), 'sortByBanned' => 'desc']) }}">
                                            <img src="/admin/images/down.png" width="13" height="13" alt="По убыванию">
                                        </a>
                                        <a href="{{ route('admin.users.index', ['banned' => request('banned'), 'sortByBanned' => 'asc']) }}">
                                            <img src="/admin/images/up.png" width="13" height="13" alt="По возростанию">
                                        </a>
                                    </th>
                                    <th>
                                        Role
                                        <a href="{{ route('admin.users.index', ['role' => request('role'), 'sortByRole' => 'asc']) }}">
                                            <img src="/admin/images/down.png" width="13" height="13" alt="По убыванию">
                                        </a>
                                        <a href="{{ route('admin.users.index', ['role' => request('role'), 'sortByRole' => 'desc']) }}">
                                            <img src="/admin/images/up.png" width="13" height="13" alt="По возростанию">
                                        </a>
                                    </th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr @if ($user->banned) bgcolor="#696969" @endif>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->banned }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                              style="display: inline"
                                              onsubmit="return confirm('Are you sure?');">
                                            <input type="hidden" name="_method" value="DELETE">
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                        {{ Form::open(array('url' => 'admin/' . $user->id . '/baned')) }}
                                        @if($user->banned)
                                            {{ Form::submit('Unban', ['class' => 'btn btn-success']) }}
                                        @else
                                            {{ Form::submit('Bane', [ 'class' => 'btn btn-warning']) }}
                                        @endif
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No entries found.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection