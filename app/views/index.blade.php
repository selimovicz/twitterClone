@extends('master')

@section('show')

        <h2 class="form-signin-heading" style="text-align:center;">Twitter clone</h2>
        @if($errors->any())
        	<div class="alert alert-danger" >
        		{{implode('',$errors->all('<li>:message</li>'))}}

        	</div>
        @endif
        
        @if(Session::has('message'))
        <div class="alert alert-info ">
       	    <p class="">{{ Session::get('message') }}</p>
      </div>
        @endif
      {{ Form::open(array('url' => 'profiles/login','class'=>'form-signin')) }}
      	{{Form::email('email','',array('class'=>'form-control','placeHolder'=>'Email'))}}
      	{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password','style'=>'margin-top:10px;')) }}<br/>
      	<p>Don't have account? Register {{HTML::link('profiles/create','here')}}.<br/><br/>
      	{{Form::submit('Sign in',array('class'=>'btn btn-lg btn-primary btn-block'))}}
      {{ Form::close() }}


@stop
