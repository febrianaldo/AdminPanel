@extends('layouts.app')

@section('title', 'Create Companies - Laravel Auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a class="btn btn-default mb-1 text-primary" href="/companies" role="button">
                << Back</a>
                    <div class="card">
                        <div class="card-header">{{ __('Companies') }}</div>

                        <div class="card-body">

                            <div class="card-header">{{ __('Form Add New Company') }}</div>

                            <div class="card p-2">

                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <form class="form-horizontal" method="post" action="/companies">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name" class="col-sm-12 control-label">Company Name<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-12">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                placeholder="Company name...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-12 control-label">Company Email</label>
                                        <div class="col-sm-12">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                placeholder="Company email...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="website" class="col-sm-12 control-label">Company Website</label>
                                        <div class="col-sm-12">
                                            <input id="website" type="text"
                                                class="form-control @error('website') is-invalid @enderror"
                                                name="website" placeholder="Company website...">
                                        </div>
                                    </div>

                                    <div class="form-group m-b-0">
                                        <div class="col-sm-offset-1 col-sm-9">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Add
                                                Data</button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
        </div>
    </div>
</div>
@endsection