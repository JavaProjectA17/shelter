@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Edit image</h3>

            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(['route' =>['admin.slider.update',$images->id],'method'=>'put','files'=>true, 'enctype'=>'multipart/form-data'])  !!}
                    <div class="form-group">
                        <img src="{{$images->getImage()}}{{$images->images}}" alt="" width="200" class="img-responsive">
                        <label for="exampleInputFile">Image</label>
                        <input type="file" name="imageSlider" id="exampleInputFile">
                    </div>
                    <br>
                    <br>
                    <div class="box-footer">
                        <button class="btn btn-success pull-right">Send</button>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection