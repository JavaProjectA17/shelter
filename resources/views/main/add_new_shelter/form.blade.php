<div class="grid_5 prefix_1">
    <h2 class="ic1">Form of adding a new cattery</h2>
    {!! Form::open(['url' => 'send-mail', 'id'=>'form', 'method'=>'POST']) !!}
    <div class="form-inputs">
        {{ Form::text("Selter's name", $value = null, ['placeholder' => 'Enter the name of the shelter']) }}
        {{ Form::text('adress', $value = null, ['placeholder' => 'Enter adress of the shelter']) }}
        {{ Form::text('phone namber', $value = null, ['placeholder' => 'Enter contact phone number']) }}
        {{ Form::text('description', $value = null, ['placeholder' => 'Enter description']) }}
        {{Form::submit('Send', ['class' => 'btn'])}}
    </div>
    {!! Form::close() !!}
</div>