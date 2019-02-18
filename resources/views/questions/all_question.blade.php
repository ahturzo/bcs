<!DOCTYPE html>
<html>
<head>
	<title>BCS-All Questions</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<h2 class="text-center">All Question's of BCS Exam</h2><hr>

<form class="jumbotron p-3 p-md-5 text-white rounded bg-dark" action="{{ url('/request_question')}}" method="get" enctype="multipart/form-data"> {{ csrf_field() }}

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

@yield('question')

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
							@if(Auth::user()->role_id == 2)
								<th scope="col">Action</th>
							@endif
							</tr>
						</thead>
						<tbody>
							<?php $sl_no = 1; ?>
							@foreach($all as $alll)
								<tr class="data-row">
									<td scope="row">{{ $alll->id }}</td>
									<td class="question">{{$alll->question}}</td>
									<td class="opt_a">{{$alll->opt_A}}</td>
									<td class="opt_b">{{$alll->opt_B}}</td>
									<td class="opt_c">{{$alll->opt_C}}</td>
									<td class="opt_d">{{$alll->opt_D}}</td>
									<td class="correct_opt">{{$alll->correct_opt}}</td>
								@if(Auth::user()->role_id == 2)
									<td scope="row">
										<div class="row">
											<button type="button" class="btn btn-info btn-sm" id="edit-item" data-item-id="{{ $alll->id }}"><i class="fas fa-edit"></i></button>

											<button type="button" class="btn btn-danger btn-sm" id="delete-item" data-item-id="{{ $alll->id }}"><i class="fas fa-trash-alt"></i></button>
										</div>
									</td>
								@endif
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

@include('layouts.editQuestionModal')
@include('layouts.deleteQuestionModal')

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> --}}

<script type="text/javascript" src="{{ asset('public/js/editQuestion.js') }}">
	 // this js needed for edit question modal
</script>

<script type="text/javascript" src="{{ asset('public/js/deleteQuestion.js') }}">
	 // this js needed for delete question modal
</script>

</body>
</html>