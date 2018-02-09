@extends('employee.home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset">
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
                        <form action="{{ route('employee.animals.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            Pet name:
                            <br />
                            <input type="text" name="name" value="{{ old('name') }}" />
                            <br /><br />
                            Pet Image:
                            <br />
                            <input type="file" name="image" accept="image/*" />
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
                            Shelter
                            <select name="shelter_id" class="form-control" style="width: 17%" disabled>
                                <option value="{{$shelter->id}}">{{$shelter->nameshelter}}</option>
                            </select>
                            <br>
                            <br>
                            <input type="submit" value="Submit" class="btn btn-default" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection