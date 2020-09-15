@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="card">
				<div class="card-heading">Login</div>
				<div class="card-body">
					<form role="form" method="POST" action"{{ url('/login') }}">
						{!! csrf_field() !!}
						<div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
							<label class="col-md-4 control-label">Email Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email')}}">
								@if ($errors->has('email'))
									<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
								@if ($errors->has('password'))
									<span class="help-block">
										<strong>{{ $errors->first('passowrd') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember">Remember me
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<button type="submit" class="btn btn-primary">
									<i class="fa fa-btn fa-sign-in"></i>Login
								</button>
								<a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot your password?</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection