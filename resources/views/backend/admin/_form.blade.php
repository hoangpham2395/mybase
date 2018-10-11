@include('layouts.backend.errors')
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!} <span class="color-red">[<i class="fa fa-asterisk"></i>]</span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter name']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('email', 'Email:') !!} <span class="color-red">[<i class="fa fa-asterisk"></i>]</span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope-open"></i></span>
                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter email']) !!}
            </div>
        </div>
    </div>
</div>
@if (!isset($entity))
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('password', 'Password:') !!} <span class="color-red">[<i class="fa fa-asterisk"></i>]</span>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter password']) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('confirm_password', 'Password confirmation:') !!} <span class="color-red">[<i class="fa fa-asterisk"></i>]</span>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    {!! Form::password('confirm_password', ['class' => 'form-control', 'placeholder' => 'Enter password confirmation']) !!}
                </div>
            </div>
        </div>
    </div>
@endif
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('birth_day', 'Birth day:') !!} <span class="color-red">[<i class="fa fa-asterisk"></i>]</span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                {!! Form::text('birth_day', null, ['class' => 'datepicker form-control', 'placeholder' => 'Enter birth day']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('role_type', 'Role type:') !!} <span class="color-red">[<i class="fa fa-asterisk"></i>]</span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                {!! Form::select('role_type', $params['role_type'], null, ['class' => 'form-control', 'placeholder' => '--- Select role type ---']) !!}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('avatar', 'Avatar:') !!}
            <div class="input-group">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    @if (isset($entity))
                        <div class="fileinput-new" style="width: 200px; height: 200px;">
                            <img src="{{ $entity->getUrlAvatar() }}" alt="Avatar">
                        </div>
                    @endif
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; max-height: 200px;"></div>
                    <div>
                        <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="avatar"></span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.backend.btn_form')