@extends('Admin::layouts.layout')

@section('content')

<section class="content-header">
  <h1>Student</h1>
</section>
<section class="content">
	<div class="box">
		<div class="container-fluid">
			{!!Form::model($student,array('route'=>array('admin.student.update',$student->id),'method'=>'PUT' ,'class'=>'formAdmin form-horizontal','files'=>true))!!}
                <div class="form-group">
                    <label for="">Type</label>
                    {!!Form::select('type_id',$type,old('type_id'),array('class'=>'form-control'))!!}
                </div>
                <div class="form-group">
                    <label for="">Center</label>
                    {!!Form::select('center',$center,old('center'),array('class'=>'form-control'))!!}
                </div>
                <div class="form-group">
                    <label for="">Student Name</label>
                    {!!Form::text('student_name',old('student_name'),array('class'=>'form-control'))!!}
                </div>
                <div class="form-group">
                    <label for="">Student Age</label>
                    {!!Form::text('student_age',old('student_age'),array('class'=>'form-control'))!!}
                </div>
                <div class="form-group">
                    <label for="">Time At ILA</label>
                    {!!Form::text('student_year',old('student_year'),array('class'=>'form-control'))!!}
                </div>
                <div class="form-group">
                    <label for="">Content</label>
                    {!!Form::textarea('student_content',old('student_content'),array('class'=>'form-control ckeditor'))!!}
                </div>

                <div class="form-group">
                    <label for="order">Order</label>
                    {!!Form::text('order', old('order'), ['class'=> 'form-control'])!!}
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <div>
                        <span class="inline-radio"><input type="radio" name="status" value="1" {!!$student->status == 1 ? 'checked' : ''!!}> <b>Active</b> </span>
                        <span class="inline-radio"><input type="radio" name="status" value="0" {!!$student->status == 0 ? 'checked' : ''!!}> <b>Deactive</b> </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Photo</label>
                    <p>
  						<img src="{!!asset('public/uploads'.$student->student_img)!!}" width="150" alt="">
  						{!!Form::hidden('student-img-bk',$student->student_img)!!}
  					</p>
                    {!!Form::file('student_img')!!}
                    @if($errors->first('student_img'))
                        <p class="error">{!!$errors->first('student_img')!!}</p>
                    @endif
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
