@extends('Admin::layouts.layout')

@section('content')
<section class="content-header">
  <h1>Type</h1>
</section>
<section class="content">

	<div class="box">
		<div class="container-fluid">
			{!!Form::open(array('route'=>array('admin.type.store'),'class'=>'formAdmin form-horizontal','files'=>true))!!}
				<div class="form-group">
					<label for="">Name</label>
					{!!Form::text('name',old('name'),array('class'=>'form-control'))!!}
				</div>
				<div class="form-group">
					{!!Form::submit('Save',array('class'=>'btn btn-primary'))!!}
					<a href="{!!URL::previous()!!}" class="btn btn-primary">Back</a>
				</div>
			{!!Form::close()!!}
		</div>
	</div>
</section>
@stop
