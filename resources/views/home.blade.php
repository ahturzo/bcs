@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #00008B; color: white;">Dashboard</div>

                <div class="card-body" style="background-color: #FAF0E6;">
                    Welcome Back <b>{{ Auth::user()->name }}</b> !!!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
