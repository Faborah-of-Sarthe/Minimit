<div class="form-row">
    {!! Form::label('oeuvre', trans('poster.oeuvre')) !!}
    {!! Form::hidden('oeuvre_id') !!}
    {!! Form::text('oeuvre_title', null, ['class' => 'autocomplete-field oeuvre-title', 'data-url' => route('oeuvre.search')]) !!}
    <div class="autocomplete-results"></div>
</div>

<div class="images">

</div>

<div class="form-row">
    {{ Form::submit(trans('poster.submit')) }}
</div>
