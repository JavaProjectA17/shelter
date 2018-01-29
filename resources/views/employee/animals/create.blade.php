@extends('employee.home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Pet</div>

                    <div class="panel-body">
                        @if ($errors->count() > 0)
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{ route('employee.animals.store') }}" method="post">
                            {{ csrf_field() }}
                            Pet name:
                            <br />
                            <input type="text" name="name" value="{{ old('name') }}" />
                            <br /><br />
                            Pet View:
                            <br />
                            <input type="text" name="image" value="{{ old('image') }}" />
                            <br /><br />
                            About:
                            <br />
                            <input type="text" name="about" value="{{ old('about') }}" />
                            <br /><br />
                            Animal Category
                            <select name="category_id" class="form-control" style="width: 17%">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                            Birthday:
                            <br />
                            <input type="text" name="birth_date" value="{{ old('birth_date') }}" />
                            <br /><br />
                            <input type="submit" value="Submit" class="btn btn-default" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection