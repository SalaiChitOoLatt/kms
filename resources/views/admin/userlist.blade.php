@extends('layouts.master')


@section('title')
Users | KMS
@endsection

@section('pagename')
USER LIST
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Users</h4>
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
                            <a href="#" class="btn btn-info float-lg-left">Download as CSV</a>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <a href="/admin/createuser" class="btn btn-success float-lg-right">Create New User</a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                Name
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                User Type
                            </th>
                            <th colspan="2">
                                Action
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->phone }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->usertype }}
                                </td>
                                <td class="text-right">
                                    <a href="/useredit/{{ $user->id }}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="/useredit/{{ $user->id }}" method="post">
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
