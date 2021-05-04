@extends('layouts.app')

@section('title', 'Create Employees - Laravel Auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a class="btn btn-default mb-1 text-primary" href="/employees" role="button">
                << Back</a>
                    <div class="card">
                        <div class="card-header">{{ __('Employees') }}</div>

                        <div class="card-body">

                            <div class="card-header">{{ __('Form Add New Employee') }}</div>

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

                                <form class="form-horizontal" method="post" action="/employees">
                                    @csrf
                                    <div class="form-group">
                                        <label for="firstname" class="col-sm-12 control-label">Firstname<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-12">
                                            <input id="firstname" type="text"
                                                class="form-control @error('firstname') is-invalid @enderror"
                                                name="firstname" placeholder="Employee firstname...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname" class="col-sm-12 control-label">Lastname<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-12">
                                            <input id="lastname" type="text"
                                                class="form-control @error('lastname') is-invalid @enderror"
                                                name="lastname" placeholder="Employee lastname...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_companies" class="col-sm-12 control-label">Company Name<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-12">
                                            <select id="id_companies" class="form-control" name="id_companies">
                                                @foreach ($companies as $c)
                                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-12 control-label">Email</label>
                                        <div class="col-sm-12">
                                            <input id="email" type="email"
                                                class="form-control @error('employee') is-invalid @enderror"
                                                name="email" placeholder="Employee email...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="col-sm-12 control-label">Phone Number</label>
                                        <div class="col-sm-12">
                                            <input id="phone" type="number"
                                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                placeholder="Employee phone number...">
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