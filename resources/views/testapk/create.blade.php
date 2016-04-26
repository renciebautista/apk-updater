@extends('layout.default')



@section('content')


<div class="row">

	<div class="col-md-12">
		<h1 class="page-header">Upload Beta Apk</h1>
		{!! Form::open(array('action' => array('TestApkController@store'),  'class' => 'bs-component','files'=>true)) !!}
	<div class="row">
		<div class="col-lg-6">
		  	<div class="form-group">
		    	{!! Form::file('file','',array('id'=>'','class'=>'')) !!}
		  	</div>
		  	{!! Form::submit('Upload', array('class' => 'btn btn-primary btn-sm')) !!}
		  	{!! Html::linkAction('TestApkController@index', 'Back', array(), array('class' => 'btn btn-default btn-sm')) !!}
	  	</div>
  	</div>
{!! Form::close() !!}
	</div>
</div>
@endsection