<section class="message">
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if(Session::has('flash_message'))
<div class="row">
	<div class="col-xs-12">
	    <div class="alert {{ Session::get('flash_class') }} alert-dismissable">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	        {{ Session::get('flash_message') }}
	    </div>
	</div>
</div>
@endif
</section>