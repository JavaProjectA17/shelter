<div class="grid_5 prefix_1">
    @if (session('status'))
        <h2 class="response-status">{{ session('status') }}</h2>
    @endif
    <h2 class="ic1 form-new-shelter">Form of adding a new cattery</h2>
    {!! Form::open(['url' => 'send_form', 'id'=>'form', 'method'=>'POST']) !!}
    <div class="form-inputs">
        {{ Form::text("nameshelter", $value = null, ['placeholder' => 'Enter the name of the shelter']) }}
        {{ Form::text('address', $value = null, ['placeholder' => 'Enter adress of the shelter']) }}
        {{ Form::text('phone', $value = null, ['placeholder' => 'Enter contact phone number']) }}
        {{ Form::text('description', $value = null, ['placeholder' => 'Enter description']) }}
        {{Form::submit('Send', ['class' => 'btn'])}}
    </div>
    {!! Form::close() !!}
</div>