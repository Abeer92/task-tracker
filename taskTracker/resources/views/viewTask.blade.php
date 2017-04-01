@extends("layouts/index")

@section("styles")
<style>
	h2{
		color: red;
	}
</style>
@endsection

@section("content")

<h2>My Tasks</h2>

@foreach ($tasks as $task)

	<div class="col-md-8">
	<div class="panel panel-info">
  		<div class="panel-heading">{{$task->name}}</div>
  		<div class="panel-body">
  		{{$task->description}}<br>
		<a class="btn btn-success btn-sm" href="/edit/{{ $task->id }}">Edit</a>
		<a class="btn btn-danger btn-sm" href="/delete/{{ $task->id }}">Delete</a>
  		</div>
	</div>
	</div>
	
	
</ul>
<br>
@endforeach

<button class="col-md-4 col-md-offset-2 btn btn-warning" onclick="location.href='new';" class="submit-button" >Add New Task</button>
@endsection