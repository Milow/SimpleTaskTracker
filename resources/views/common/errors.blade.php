@if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>The following error(s) occurred:</strong>
		<br />
		<br />
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif