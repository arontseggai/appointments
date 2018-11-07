<div class="form-group">
    {!! Form::label('room_id', 'Room') !!}
    {!! Form::select('room_id', $rooms, null, ['class'=> 'form-control', 'placeholder' => 'Pick a room...']) !!}
</div>


<div class="form-group">
    {!! Form::submit('Submit', ['class'=>'btn btn-primary form-control']) !!}
</div>
