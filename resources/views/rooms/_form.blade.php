<div class="form-group">
    {!! Form::label('capacity', 'Capacity:') !!}
    {!! Form::selectRange('capacity', 1, 32, $room->capacity, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Submit', ['class'=>'btn btn-primary form-control']) !!}
</div>
