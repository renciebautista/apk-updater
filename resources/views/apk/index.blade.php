@extends('layout.default')


@section('content')


<div class="row">

	<div class="col-md-12">
		<h1 class="page-header">Apk Lists</h1>
		{!! Html::linkRoute('apk.create', 'Add Apk', array(), ['class' => 'btn btn-primary btn-sm']) !!}
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>Application Name</th>
						<th>Package Name</th>
						<th>Version</th>
						<th>Downloads</th>
						<th>Size</th>
						<th>Uploaded at</th>
						<th>MD5</th>
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
						<td>0</td> 
						<td>{{ $apk->filesize }}</td> 
						<td>{{ $apk->app_name }}</td> 
						<td>{{ $apk->md5 }}</td> 
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