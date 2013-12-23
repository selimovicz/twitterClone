@extends('master')

@section('show')


{{ Form::open(array('route'=>'profiles.store', 'class'=>'form-signin')) }}
   <h2 class="form-signup-heading">Please Register</h2>
 
   @if($errors->any())
        	<div class="alert alert-danger">
        		{{implode('',$errors->all('<li>:message</li>'))}}

        	</div>
    @endif
   {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address'))}}
   {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password','style'=>'margin-top:10px;')) }}
   {{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) }}
 
   {{ Form::submit('Register', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}

@stop