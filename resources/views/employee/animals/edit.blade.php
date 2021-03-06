@extends('employee.home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Pet</div>

                    <div class="panel-body">
                        @if ($errors->count() > 0)
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{ route('employee.animals.update', $animal->id) }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            {{ csrf_field() }}
                            Pet name:
                            <br />
                            <input type="text" name="name" value="{{ $animal->name }}" />
                            <br /><br />
                            Pet Image:
                            <br />
                            <input type="file" name="image" accept="image/*" />
                            <br /><br />
                            About:
                            <br />
                            <input type="text" name="about" value="{{ $animal->about }}" />
                            <br /><br />
                            Animal Category
                            <select name="category_id" class="form-control" style="width: 17%">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                            @if ($animal->categoryName() == $category->title)
                                                selected="selected"
                                            @endif
                                    >
                                        {{$category->title}}
                                    </option>
                                @endforeach
                            </select>
                            Birthday:
                            <br />
                            <input type="text" name="birth_date" value="{{ $animal->birth_date }}" />
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