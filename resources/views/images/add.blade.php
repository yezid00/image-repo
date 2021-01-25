@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-md-8">
			<form method = "POST" action="{{ route('save') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<div class="form-group">
					<label for="images">Image</label>
					<input type="file" class="form-control" name="images[]" multiple>
				</div>
				<div class="form-group">
					<label class="form-check-label" for="permission">Permission(check for private)</label>
					 <input type="checkbox" name="permission" value="1" class="form-check-input ml-2">
					 
				</div>

				</div>
				<button class="btn btn-primary btn-sm">Add Image</button>
			</form>
		</div>
	</div>

@endsection