@if (session('status'))
    <h2 class="response-status">{{ session('status') }}</h2>
@endif
<div class="content_page1">
    <div class="content page1">
        <h2 class="ic1">Форма додавання нового притулку</h2>
        <div class="grid_5prefix_1">
            {!! Form::open([ route('add_new_shelter.create'), 'id'=>'form', 'method'=>'POST']) !!}
            <div class="form-inputs">
                {{ Form::text("nameshelter", $value = null, ['placeholder' => 'Введіть назву притулку']) }}<br><br>
                 {{ Form::text('address', $value = null, ['placeholder' => 'Введіть адресу притулку']) }}<br><br>
                 {{ Form::text('phone', $value = null, ['placeholder' => 'Введіть номер телефону']) }}<br><br>
            </div>
            <div class="desc">
                {{ Form::textarea('description', $value = null, ['placeholder' => 'Введіть опис']) }}<br><br>
            </div>
            {{Form::submit('Відправити', ['class' => 'btn'])}}

            {!! Form::close() !!}
            </div>
    </div>
</div>