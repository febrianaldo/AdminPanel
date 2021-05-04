@extends('layouts.app')

@section('title', 'Dashboard - Laravel Auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body mx-auto">
                    <a class="btn btn-outline-secondary btn-lg" href="/companies" role="button">CRUD COMPANIES</a>
                    <a class="btn btn-outline-secondary btn-lg" href="/employees" role="button">CRUD EMPLOYEES</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection