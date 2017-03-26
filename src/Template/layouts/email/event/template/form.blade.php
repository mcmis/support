
<div class="form-group">
    {!! Form::label('subject', 'Subject') !!}
    {!! Form::text('subject', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', trans('common.email_body')) !!}
    {!! Form::textarea('body', null, ['class' => 'form-control rich-editor']) !!}
</div>
