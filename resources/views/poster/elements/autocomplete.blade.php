{!! Form::label('oeuvre_title', trans('poster.oeuvre')) !!}
{!! Form::hidden('oeuvre_id', null, ['class' => 'autofill-hidden', 'autocomplete' => 'off']) !!}
{!! Form::text('oeuvre_title',  null, ['class' => 'autocomplete-field autofill oeuvre-title', 'data-url' => route('oeuvre.search'), 'autocomplete' => 'off']) !!}
<div class="autocomplete-results hidden"></div>
<div class="chosen-oeuvre @if(empty($oeuvreTitle)) hidden @endif">
    <div class="title">{{ $oeuvreTitle or null }}</div>
    <div class="close">✖</div>
</div>
