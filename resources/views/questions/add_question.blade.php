<!DOCTYPE html>
<html>
<head>
	<title>Add Question</title>
</head>
<body>
@extends('layouts.app')

@section('content')
	<h2 class="text-center">Upload Question File</h2>
	<hr>
	<form class="jumbotron p-3 p-md-5 text-white rounded bg-dark" action="{{ url('/save_question')}}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-6" style="margin-left: 10px;">
				Question Catagory
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-6" style="margin-left: 10px;">
				<div class="form-group">
				    <select class="custom-select" name="catagory">
				      <option value="">Catagory Name</option>
				      @foreach($catagories as $catagorie)
				      	<option value="{{ $catagorie->id }}">{{ $catagorie->catagory }}</option>
				      @endforeach
				    </select>
				    <p style="color: red;"> {{ $errors->first('catagory') }}</p>
				</div>
			</div>
		</div><br>

		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-6" style="margin-left: 10px;">
				Upload Question File
			</div>
		  	<div class="col-lg-8 col-md-8 col-sm-8 col-6" style="margin-left: 10px;">
		  		  <div class="form-group">
				    <div class="input-group mb-3">
				      <div class="custom-file">
				      	{{-- <input type="file" name="file"> --}}
				        <input type="file" class="custom-file-input" name="file">
				        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
				      </div>
				      <div class="input-group-append">
				      	<input type="submit" class="input-group-text btn btn-secondary" value="Upload" name="submit">
				      </div>
				    </div>
				    <p style="color: red;"> {{ $errors->first('file') }}</p>
				  </div>
		  	</div>
		</div>
	</form>
@endsection

</body>
</html>