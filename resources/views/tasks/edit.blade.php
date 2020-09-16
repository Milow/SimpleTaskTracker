@extends('layouts.app')

@section('content')
	<div class="card col-md-10 mx-auto">
	<div class="card-body">
		@include('common.errors')

		<form action="{{ url('/task/edit/' . $task->id) }}" method="POST">
			@method('patch')
			{{ csrf_field() }}
			<div class="form-group">
				<label for="title" class="col-md-3 control-label">Title</label>
				<div class="col-md-6">
					<input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}">
				</div>
			</div>
			<div class="form-group">
				<label for="priority" class="col-md-3 control-label">Priority</label>
				<div class="col-md-6">
					<input type="text" name="priority" id="priority" class="form-control" value="{{ $task->priority }}">
				</div>
			</div>
			<div class="form-group">
				<label for="notes" class="col-md-3 control-label">Notes</label>
				<div class="col-md-6">
					<textarea name="notes" id="notes" class="form-control">{{ $task->notes }}</textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6">
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-plus"></i>Update Task
					</button>
					<a href="{{ url('/tasks') }}">Cancel</a>
				</div>
			</div>
		</form>
	</div>
@endsection