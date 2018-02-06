@extends('admin.app')

@section('content')

    <div class="container">
        <div class="row">
            <h3>Slider - list of images</h3>
            <a href="{{route('admin.slider.create')}}" class = "btn btn-success"> Create</a>
            <div class="col-md-10 col-md-offset-1">
                <table class="table">
                    <thead>
                    <tr>
                        <td>Id</td>
                        <td>Image</td>
                        <td>Action</td>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($images as $image)
                        <tr>
                            <td>{{$image->id}}</td>
                            <td><img src="{{$image->getImage()}}" alt=""></td>
                            <td>
                                <a href="{{route('admin.slider.edit', $image->id)}}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                {!! Form::open(['route' => ['admin.slider.destroy',$image->id],'method'=>'delete']) !!}
                                <button onclick="return confirm('Do you want to delete?')">
                                    <i class="fa fa-remove"></i>
                                </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection