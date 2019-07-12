
	@extends('layout.common')
	@section('title','登录')
	@section('body')
	<!-- login -->
	<div class="pages section">
		<div class="container">
			<div class="pages-head">
				<h3>登录</h3>
			</div>
			<div class="login">
				<div class="row">
					<form class="col s12" action="{{url('login/add_login')}}" method="post">
						{{ csrf_field() }}
						<div class="input-field" >
							<input type="text" class="validate" name="name" placeholder="USERNAME" required>
						</div>
						<div class="input-field">
							<input type="password" class="validate" name="password" placeholder="PASSWORD" required>
						</div>
						<a href=""><h6>忘记密码</h6></a>
						<input type="submit" value='登录' class="btn button-default">
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end login -->
	@endsection
