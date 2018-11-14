<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::submit('Submit', ['class'=>'btn btn-primary form-control']) !!}
</div>
