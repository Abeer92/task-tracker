@extends("layouts/index")

@section("styles")
	<style>
		h2{
			color: red;
		}
	</style>
@endsection

@section("content")
		<div class='row'>
		<div class='col-md-6 col-md-offset-3'>
			<div class='form-horizontal'>
				<div class="form-group">
				<form method="post" action="/update">
					<h2>{{$title}}</h2>
					<input type="hidden" name="id" value="{{ $task->id }}">
					{{csrf_field()}}
					<label class="control-label">Name:</label>
					<input class="form-control" type="text" name="name" value="{{ $task->name }}"><br>
					<label class="control-label">Description:</label>
					<input class="form-control" type="text" name="description" value="{{ $task->description }}"><br>
					<input class='btn btn-success' type="submit" name="submit">
				</form>
				</div>
			</div>
		</div>
		</div>
@endsection