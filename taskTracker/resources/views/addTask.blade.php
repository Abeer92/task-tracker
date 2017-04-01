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
				<form action="/posttask" method="post" clas='col-md-6 col-md-offset-3'>
				{{csrf_field()}}
					<h2>Add new Task</h2>
					<label class="control-label">Name:</label> 
					<input class="form-control" type="text" name="name"><br>
					<label class="control-label">Description:</label>
					<input class="form-control" type="text" name="description"><br>
					<input class='btn btn-success' type="Submit" name="submit">
				</form>
				</div>
			</div>
			</div>
		</div>
@endsection