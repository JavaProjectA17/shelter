@if (session('status'))
    <h2 class="response-status">{{ session('status') }}</h2>
@endif
<div class="form-new-shelter">
    <h2 class="ic1">Form of adding a new cattery</h2>
    <div class="grid_5 prefix_1">
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
</div>