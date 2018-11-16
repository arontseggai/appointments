
<div class="form-group">
    {!! Form::label('start_date', 'Date') !!}
    {!! Form::date('start_date', $appointment->start_date, ['class'=> 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('end_date', 'End Date') !!}
    {!! Form::date('end_date', $appointment->end_date, ['class'=> 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('status', 'Confirmed') !!}
    {!! Form::select('status', $appointment->listStatus(), $appointment->status); !!}
</div>


<div class="form-group">
    {!! Form::label('bed_id', 'Pick available bed') !!}
    {{-- {!! dd($appointment) !!} --}}
    {!! Form::select('bed_id', $bedsList, $appointment->bed_id, ['placeholder' => 'None']); !!}
</div>



<div class="form-group">
    {!! Form::label('employee_id', 'Assign employee') !!}
    {{-- {!! dd($appointment) !!} --}}
    {!! Form::select('employee_id', $employeesList, $appointment->employee_id, ['placeholder' => 'None']); !!}
</div>



<div class="form-group">
    {!! Form::submit('Submit', ['class'=>'btn btn-primary form-control']) !!}
</div>
