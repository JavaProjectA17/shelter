@extends('admin.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit News</div>

                    <div class="panel-body">
                        @if ($errors->count() > 0)
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{ route('admin.novelties.update', $novelty->id) }}"  method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            {{ csrf_field() }}
                            Title:
                            <br />
                            <input type="text" class="form-control" name="title" value="{{ $novelty->title }}" />
                            <br /><br />
                            Image:
                            <br /><br/>
                            
                                    <img class=" img-responsive img-thumbnail" style="max-width: 150px;" src="{{ $novelty->getImage() }}">
                                <br/>
                                <br/>
                                    <input type="file" name="image" />
                               
                            <br /><br />
                            Short description:
                            <br />
                            <textarea type="text" class="form-control" id="editor" name="short_description" >{{ $novelty->short_description }}</textarea>
                            <br /><br />
                            Description:
                            <br />
                            <textarea type="text" class="form-control" id="editor2" name="description" >{{ $novelty->description }}</textarea>
                            <br /><br />
                            Date of publication:
                            <br />
                            <input type="date" name="start" value="{{ $novelty->start }}" />
                            <br /><br />
                            <input type="submit" value="Save" class="btn btn-primary" />
                            <a class="btn btn-danger" href="{{ route('admin.novelties.index') }}"><i class="fa fa-btn fa-bank"></i>Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection