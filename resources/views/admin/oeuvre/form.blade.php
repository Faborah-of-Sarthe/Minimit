<div class="form-row">
    {!! Form::label('title_ov', trans('oeuvre.title_ov_label')) !!}
    {!! Form::text('title_ov') !!}
</div>
<div class="form-row">
    {!! Form::label('title_fr', trans('oeuvre.title_fr_label')) !!}
    {!! Form::text('title_fr') !!}
</div>
<div class="form-row">
    {!! Form::label('title_en', trans('oeuvre.title_en_label')) !!}
    {!! Form::text('title_en') !!}
</div>
<div class="form-row">
    {!! Form::label('year', trans('oeuvre.year_label'), ['class' => 'year']) !!}
    {!! Form::text('year') !!}
</div>
<div class="form-row">
    {!! Form::label('active', trans('oeuvre.active_label'), ['class' => 'activation']) !!}
    <?php $checked = (!isset($oeuvre) || $oeuvre->active == 1)? true : false; ?>
    {!! Form::checkbox('active','1', $checked) !!}
</div>
<div class="form-row">
    {{ Form::submit(trans('oeuvre.submit')) }}
</div>
