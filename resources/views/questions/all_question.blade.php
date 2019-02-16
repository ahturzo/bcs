<!DOCTYPE html>
<html>
<head>
	<title>BCS-All Questions</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<h2 class="text-center">All Question's of BCS Exam</h2><hr>

<form class="jumbotron p-3 p-md-5 text-white rounded bg-dark" action="{{ url('/request_question')}}" method="post" enctype="multipart/form-data"> {{ csrf_field() }}

	<div class="row">
		<div class="col-lg-3 col-md-4 col-sm-5 col-6">
			<div style="margin-left: 10px;">
				<b>Selete Question Catagory</b>
			</div>
		</div>
		<div class="col-lg-9 col-md-8 col-sm-7 col-6">
			<div style="margin-left: 10px; margin-right: 10px;">
				<div class="form-group">
					<select class="custom-select" name="catagory" required>
						<option value="">Catagory Name</option>
						    @foreach($catagories as $catagorie)
						      	<option value="{{ $catagorie->id }}">{{ $catagorie->catagory }}</option>
						    @endforeach
					</select>
					<p style="color: red;"> {{ $errors->first('catagory') }}</p>
				</div>
			</div>
		</div>	
	</div>

	<div class="row">
		<div class="col-sm-12">
			<div class="text-center">
				<input type="submit" name="Show" class="btn btn-secondary">
			</div>
		</div>
	</div>
</form>

@if(count($catagoryName) != null)
	<div class="jumbotron">
		<div class="text-center">
			@foreach($catagoryName as $cat)
				<h3>{{ $cat->catagory }}</h3><hr>
			@endforeach
		</div>
		
		@if(count($all) != null)
			<div class="mt-4 row table-responsive">
				<div class="col-lg-12" style="height: 500px; width:100%; overflow-y: scroll;">
					
					<table class="table table-striped table-dark table-hover text-center" style="margin-left: 10px;">
						<thead style="color: red;" class="font-weight-bold h6">
							<tr>
								<th scope="col">#</th>
								<th scope="col">Question</th>
								<th scope="col">Option A</th>
								<th scope="col">Option B</th>
								<th scope="col">Option C</th>
								<th scope="col">Option D</th>
								<th scope="col">Correct Answer</th>
								<th scope="col">Catagory</th>
							</tr>
						</thead>
						<tbody>
							<?php $sl_no = 1; ?>
							@foreach($all as $alll)
								<tr>
									<td scope="row">{{ $sl_no++ }}</td>
									<td scope="row">{{$alll->question}}</td>
									<td scope="row">{{$alll->opt_A}}</td>
									<td scope="row">{{$alll->opt_B}}</td>
									<td scope="row">{{$alll->opt_C}}</td>
									<td scope="row">{{$alll->opt_D}}</td>
									<td scope="row">{{$alll->correct_opt}}</td>
									<td scope="row">{{$alll->catagory_id}}</td>
								</tr>
							@endforeach
						</tbody>

					</table>
					{{ $all->links() }} {{-- pagination link --}}
				</div>
			</div>	{{--end table--}}
		@else
			<div class="text-center mt-3">
				<h4>No data found in this catagory.</h4>
			</div>
		@endif {{-- endif which will check data exist or not--}}
	</div>

@endif {{--this endif check name exist of not --}}


		
			





@endsection

</body>
</html>