@extends('admin.app')

@section('content')

    <div class="container">
        <div class="row">
            <h3>Add image</h3>

            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(['route' =>['admin.slider.store'],'files'=>true, 'enctype'=>'multipart/form-data'])  !!}
                    <div class="form-group">
                        <label for="exampleInputFile">Image</label>

                        <input type="file" name="imageSlider" id="exampleInputFile">

                    </div>
                    <br>
                    <br>

                        <button class="btn btn-success pull-right">Add</button>

                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection