@extends('employee.home')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="card card-user">
                        <div class="image">
                            <img src="/assets/img/background.jpg" alt="..."/>
                        </div>
                        <div class="content">
                            <div class="author">
                                <img class="avatar border-white" src="/assets/img/faces/face-2.jpg" alt="..."/>
                                <h4 class="title">Lviv's shelter 4<br />
                                    <a href="#"><small>@chetfaker</small></a>
                                </h4>
                            </div>
                            <p class="description text-center">
                                "Описание какое-то"
                            </p>
                        </div>
                        <hr>
                        <div class="text-center">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    <h5>12<br /><small>Files</small></h5>
                                </div>
                                <div class="col-md-4">
                                    <h5>2GB<br /><small>Used</small></h5>
                                </div>
                                <div class="col-md-3">
                                    <h5>24,6$<br /><small>Spent</small></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-7">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Change password</h4>
                            <div class="content">

                                {!! Form::open([ route('employee.change_password.edit'), 'method'=>'POST']) !!}
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Current password</label>
                                        <div class="form-group">
                                            {{ Form::password("old_password", $value = null, ['class'=>'form-control border-input', 'placeholder' => 'Current password']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>New password</label>
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            {{ Form::password("new_password", $value = null, ['class'=>'form-control border-input', 'placeholder' => 'New password']) }}
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Confirm new password</label>
                                        <div class="form-group">
                                            {{ Form::password("confirm_new_password", $value = null, ['class'=>'form-control border-input', 'placeholder' => 'Confirm new password']) }}
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    {{Form::submit('RECOVER', ['class' => 'btn btn-info btn-fill btn-wd'])}}
                                </div>
                                {!! Form::close() !!}
                                @if (session('status'))
                                    <h4 class="title">{{ session('status') }}</h4>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
