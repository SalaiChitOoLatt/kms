@extends('layouts.master')


@section('title')
Category | KMS
@endsection

@section('pagename')
Categories
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Role List</h4>
                @if (session('status'))
                <div class="alert alert-info" role="alert">
                    {{ session('status') }}
                </div>
                @endif
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <a href="/role/downloadcsv" class="btn btn-info float-lg-left">Download as CSV</a>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <a href="/role/create" class="btn btn-success float-lg-right">
                                Create New Category
                            </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                Role Name
                            </th>
                            <th>
                                Description
                            </th>
                            <th colspan="2">
                                Action
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>
                                    {{ $role->role_name}}
                                </td>
                                <td>
                                    <p class="text-justify w-70 px-3">
                                        {{ $role->description }}
                                    </p>
                                </td>
                                <td class="text-right">
                                <a href="roleedit/{{ $role->id }}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="roledelete/{{ $role->id }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
