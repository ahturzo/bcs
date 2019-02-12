<!DOCTYPE html>
<html>
<head>
	<title>BCS-All Questions</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<h2 class="text-center">All Question's of BCS Exam</h2><hr>
			
			<div class="row table-responsive">
				<div class="col-lg-12">
					<table class="table table-striped table-dark table-hover text-center" style="margin-left: 10px;">
						<thead style="color: red;" class="font-weight-bold h6">
							<tr>
								<th scope="col">Sl No.</th>
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
				</div>
			</div>  {{--end table--}}






@endsection

</body>
</html>