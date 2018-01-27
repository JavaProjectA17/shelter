
<h3>Create category</h3>

{!! Form::open(['url' => route('animalcategories.store'), 'method'=> 'post']) !!}
    {{Form::text('title')}}
    {{Form::submit('Save')}}
{{Form::close()}}
