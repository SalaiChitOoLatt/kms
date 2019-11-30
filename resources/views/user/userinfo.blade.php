@extends('layouts.app')

@section('title')
User Information | KMS
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mx-2">
            <div class="card-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <h4 class="card-title">User Information</h4>
                        </div>
                        <div class="col-md-6 col-xs-12 text-right">
                            <a href="/" class="btn btn-danger">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>
                                            User ID
                                        </th>
                                        <td>
                                            {{ $users->id}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            User Name
                                        </th>
                                        <td>
                                            {{ $users->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            User Type
                                        </th>

                                        <td>
                                            {{ $users->usertype }}
                                        </td>

                                    </tr>
                                    <tr>
                                        <th>
                                            Email
                                        </th>
                                        <td>
                                            {{ $users->email }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
