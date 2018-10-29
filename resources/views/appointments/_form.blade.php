
<div class="form-group">
    {!! Form::label('start_date', 'Date') !!}
    {!! Form::date('start_date', $appointment->start_date, ['class'=> 'form-control']) !!}
</div>

<div class="form-group">
        {!! Form::label('end_date', 'End Date') !!}
        {!! Form::date('end_date', $appointment->end_date, ['class'=> 'form-control']) !!}
    </div>


<div class="form-group">
    {!! Form::submit('Submit', ['class'=>'btn btn-primary form-control']) !!}
</div>
