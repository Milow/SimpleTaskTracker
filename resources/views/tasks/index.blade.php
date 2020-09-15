@extends('layouts.app')

@section('content')
	<div class="card">
	<div class="card-body">
		@include('common.errors')

		<form action="{{ url('/tasks') }}" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="title" class="col-md-3 control-label">Title</label>
				<div class="col-md-6">
					<input type="text" name="title" id="title" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label for="priority" class="col-md-3 control-label">Priority</label>
				<div class="col-md-6">
					<input type="text" name="priority" id="priority" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label for="notes" class="col-md-3 control-label">Notes</label>
				<div class="col-md-6">
					<textarea name="notes" id="notes" class="form-control"></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6">
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-plus"></i>Add Task
					</button>
				</div>
			</div>
		</form>
	</div>
	@if (count($tasks) > 0)
		<div class="card">
			<div class="card-header">
				Current Tasks
			</div>
			<div class="card-body">
				<table class="table table-striped task-table">
					<thead>
						<th>Task</th>
						<th>Priority</th>
						<th>&nbsp;</th>
					</thead>
					<tbody>
						@foreach ($tasks as $task)
							<tr>
								<td class="table-text">
									<div>{{ $task->title }}</div>
								</td>
								<td class="table-text">
									<div>{{ $task->priority }}</div>
								</td>
								<td>
									<form action="{{ url('/task/' . $task->id) }}" method="POST">
										{{ csrf_field() }}
										{{ method_field('DELETE')}}
										<button class="btn btn-danger">Delete Task</button>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	@endif
	</div>
@endsection