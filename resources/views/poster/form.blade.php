<div class="form-row">
    {!! Form::label('oeuvre', trans('poster.oeuvre')) !!}
    {!! Form::hidden('oeuvre_id', null, ['class' => 'autofill-hidden', 'autocomplete' => 'off']) !!}
    {!! Form::text('oeuvre_title', null, ['class' => 'autocomplete-field autofill oeuvre-title', 'data-url' => route('oeuvre.search'), 'autocomplete' => 'off']) !!}
    <div class="autocomplete-results hidden"></div>
</div>

<div class="images">

</div>

<div class="form-row">
    {{ Form::submit(trans('poster.submit')) }}
</div>
