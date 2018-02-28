{!! Form::label('oeuvre_title', trans('poster.oeuvre')) !!}
{!! Form::hidden('oeuvre_id', null, ['class' => 'autofill-hidden', 'autocomplete' => 'off']) !!}
{!! Form::text('oeuvre_title', $oeuvreTitle, ['class' => 'autocomplete-field autofill oeuvre-title', 'data-url' => route('oeuvre.search'), 'autocomplete' => 'off']) !!}
<div class="autocomplete-results hidden"></div>