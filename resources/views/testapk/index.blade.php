@extends('layout.default')


@section('content')


<div class="row">

	<div class="col-md-12">
		<h1 class="page-header">Beta Apk Lists</h1>
		{!! Html::linkRoute('testapk.create', 'Add Beta Apk', array(), ['class' => 'btn btn-primary btn-sm']) !!}
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>Application Name</th>
						<th>Package Name</th>
						<th>Version</th>
						<th>Version Name</th>
						<th>Downloads</th>
						<th>Size</th>
						<th>Uploaded at</th>
						<th>MD5</th>
						<th colspan="2"></th>
					<th></th>
					</tr>
				</thead>
				<tbody>
					@if(count($apks) > 0)
					@foreach($apks as $apk)
					<tr> 
						<th scope="row">{{ $apk->app_name }}</th> 
						<td>{{ $apk->pkgname }}</td> 
						<td>{{ $apk->version }}</td> 
						<td>{{ $apk->version_name }}</td> 
						<td>0</td> 
						<td>{{ $apk->filesize }}</td> 
						<td>{{ $apk->created_at }}</td> 
						<td>{{ $apk->md5 }}</td> 
						<td>
							{!! Form::open(array('method' => 'DELETE', 'action' => array('TestApkController@destroy', $apk->id), 'class' => 'disable-button')) !!}                       
							{!! Form::submit('Remove', array('class'=> 'btn btn-danger btn-xs','onclick' => "if(!confirm('Are you sure to delete this apk?')){return false;};")) !!}
							{!! Form::close() !!}
						</td>
						<td>
							{!! Html::linkRoute('testapk.show', 'Download', array('id' => $apk->id), ['class' => 'btn btn-success btn-xs']) !!}
						</td>
					</tr> 
					@endforeach
					@else
					<tr> 
						<th colspan="7">No apk found.</th> 
					</tr> 
					@endif
				</tbody> 
			</table> 
		</div>
	</div>
</div>
@endsection