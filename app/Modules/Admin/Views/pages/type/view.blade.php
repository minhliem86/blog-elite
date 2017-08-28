@extends('Admin::layouts.layout')

@section('content')

<section class="content-header">
  <h1>Type</h1>
</section>
<section class="content">
	<div class="box">
		<div class="container-fluid">
			{!!Form::model($type,array('route'=>array('admin.type.update',$type->id),'method'=>'PUT' ,'class'=>'formAdmin form-horizontal','files'=>true))!!}
                <div class="form-group">
                    <label for="">Name</label>
                    {!!Form::text('name',old('name'),array('class'=>'form-control'))!!}
                </div>
                <div class="form-group">
                    <label for="order">Order</label>
                    {!!Form::text('order', old('order'), ['class'=> 'form-control'])!!}
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <div>
                        <span class="inline-radio"><input type="radio" name="status" value="1" {!!$type->status == 1 ? 'checked' : ''!!}> <b>Active</b> </span>
                        <span class="inline-radio"><input type="radio" name="status" value="0" {!!$type->status == 0 ? 'checked' : ''!!}> <b>Deactive</b> </span>
                    </div>
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
