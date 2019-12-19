@extends('layouts.app')

@section('title')
Content | KMS
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mx-2">
            <div class="card-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <h4 class="card-title">Content Details</h4>
                        </div>
                        <div class="col-md-6 col-xs-12 text-right">
                            <a href="/usercontent" class="btn btn-danger">Back to Content List</a>
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
                                            Content ID
                                        </th>
                                        <td>
                                            {{ $contents->id}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Content Name
                                        </th>
                                        <td>
                                            {{ $contents->content_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Description
                                        </th>

                                        <td>
                                            {{ $contents->description }}
                                        </td>

                                    </tr>
                                    <tr>
                                        <th>
                                            Category
                                        </th>

                                        <td>
                                            {{ $contents->category->category_name }}
                                        </td>

                                    </tr>
                                    <tr>
                                        <th>
                                            Date
                                        </th>
                                        <td>
                                            {{ $contents->date }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Time
                                        </th>

                                        <td>
                                            {{ $contents->time }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Created Date
                                        </th>
                                        <td>
                                            {{ $contents->created_at }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Last Updated
                                        </th>
                                        <td>
                                            {{ $contents->updated_at }}
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
