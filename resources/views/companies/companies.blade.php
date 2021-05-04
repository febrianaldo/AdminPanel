@extends('layouts.app')

@section('title', 'Companies - Laravel Auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a class="btn btn-default mb-1 text-primary" href="/home" role="button">
                << Back</a>
                    <div class="card">
                        <div class="card-header">{{ __('Companies') }}</div>

                        <div class="card-body">
                            <a class="btn btn-success mb-3" href="/create_companies" role="button">Create New
                                Company</a>

                            <div class="card-header">{{ __('Companies List') }}</div>

                            <div class="card p-2">
                                @if (session('delete'))
                                <div class="alert alert-danger">
                                    {{ session('delete') }}
                                </div>
                                @endif
                                @if (session('create'))
                                <div class="alert alert-success">
                                    {{ session('create') }}
                                </div>
                                @endif
                                @if (session('edit'))
                                <div class="alert alert-success">
                                    {{ session('edit') }}
                                </div>
                                @endif

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Website</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $companies as $c )
                                        <tr>
                                            <th scope="row">{{ $c->name }}</th>
                                            <td>{{ $c->email }}</td>
                                            <td>{{ $c->website }}</td>
                                            <td>
                                                <a href="/edit_companies/{{ $c->id }}" class="btn btn-primary"><i
                                                        class="fa fa-pencil m-r-5"></i> Edit</a>

                                                <form action="/companies/{{ $c->id }}" method="post"
                                                    style="display: inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button onClick="return confirm('Yakin Menghapus Data Ini?')"
                                                        type="submit" class="btn btn-danger"><i
                                                            class="fa fa-trash m-r-5"></i> Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div @if ($compCount!=0) hidden @endif class="alert alert-danger mx-auto">
                                    Data not found.
                                </div>

                                <div class="d-flex justify-content-center">
                                    {{ $companies->links() }}
                                </div>

                            </div>

                        </div>
                    </div>
        </div>
    </div>
</div>
@endsection