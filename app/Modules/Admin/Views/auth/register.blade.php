<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminELITE | Registration Page</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta content="noindex, nofollow" name="robots">
	{!!Html::style('public/assets/backend/bootstrap/css/bootstrap.min.css')!!}

	 <!-- Font Awesome -->
	{!!Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css')!!}

	<!-- Ionicons -->
	{!!Html::style('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')!!}
	<!-- Theme style -->
	{!!Html::style('public/assets/backend/css/AdminLTE.min.css')!!}
	<!-- iCheck -->
	{!!Html::style('public/assets/backend/plugins/iCheck/square/blue.css')!!}
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="hold-transition register-page">
	<div class="register-box">
		<div class="register-logo">
			<a href="{!!url('/')!!}"><b>Admin</b>ELITE</a>
		</div>
		<div class="register-box-body">
			<p class="login-box-msg">Register a new membership</p>
			@include('Admin::errors.listerror')
			{!! Form::open(array('route'=>'admin.postRegister', 'class'=>'form-register')) !!}
				<div class="form-group has-feedback">
					{!!Form::text('name',old('name'), array('class'=>'form-control', 'placeholder'=>'Fullname'))!!}
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="email" class="form-control" placeholder="Email (*)" name="email" value="{!!old('email')!!}">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Password (*)" name="password">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Retype password (*)" name="password_confirmation">
					<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
				</div>
				<div class="row">
					<!-- <div class="col-xs-8">
						<div class="checkbox icheck">
							<label>
								<input type="checkbox" name="agree"> Tôi chấp nhận sử dụng dịch vụ
							</label>
						</div>
					</div> -->
					<!-- /.col -->
					<div class="col-xs-12">
						<div class="checkbox icheck">
							<label>
								<input type="radio" name="role" value="admin"> Administrator
							</label>

							<label>
								<input type="radio" name="role" value="mod"> Moderator
							</label>
						</div>
					</div>
					<div class="col-xs-12">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
					</div>
					<!-- /.col -->
				</div>
			{!! Form::close()!!}
			<!-- <div class="social-auth-links text-center">
				<p>- OR -</p>
				<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
				Facebook</a>
				<a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
				Google+</a>
			</div>
			<a href="login.html" class="text-center">I already have a membership</a> -->
		</div>
		<!-- /.form-box -->
	</div>
	<!-- /.register-box -->
	<!-- jQuery 2.1.4 -->
	{!!Html::script('public/assets/backend/js/jQuery-2.1.4.min.js')!!}
	 <!-- CORE JQUERY SCRIPTS -->
	{!!Html::script('public/assets/backend/bootstrap/js/bootstrap.min.js')!!}
	<!-- iCheck -->
	{!!Html::script('public/assets/backend/plugins/iCheck/icheck.min.js')!!}
	<script>
		$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' // optional
			});
		});
	</script>
</body>
</html>
