@extends('layouts.app')


@section('title')
Content | KMS
@endsection

@section('pagename')
Contents
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mx-2">
            <div class="card-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <h4 class="card-title">Content List</h4>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <a href="/usercontent/create" class="btn btn-success float-lg-right mx-2">
                                Create New Content
                            </a>
                            <a href="/usercontent/downloadcsv" class="btn btn-info float-lg-right mx-2">
                                Download as CSV
                            </a>
                        </div>
                    </div>
                </div>

                @if (session('status'))
                <div class="alert alert-info" role="alert">
                    {{ session('status') }}
                </div>
                @endif
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="text-center text-primary thead-light">
                                    <th>
                                        Content ID
                                    </th>
                                    <th>
                                        Content Name
                                    </th>
                                    <th>
                                        Description
                                    </th>
                                    <th>
                                        Date
                                    </th>
                                    <th>
                                        Time
                                    </th>
                                    <th>
                                        Created Date
                                    </th>
                                    <th>
                                        Last Updated
                                    </th>
                                    <th colspan="2">
                                        Action
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($contents as $content)
                                    <tr>
                                        <td>
                                            {{ $content->id}}
                                        </td>
                                        <td>
                                            {{ $content->content_name }}
                                        </td>
                                        <td>
                                            {{ $content->description }}
                                        </td>
                                        <td>
                                            {{ $content->date }}
                                        </td>
                                        <td>
                                            {{ $content->time }}
                                        </td>
                                        <td>
                                            {{ $content->created_at }}
                                        </td>
                                        <td>
                                            {{ $content->updated_at }}
                                        </td>
                                        <td class="text-right">
                                            <a href="/usercontentedit/{{ $content->id }}"
                                                class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <form action="/usercontentdelete/{{ $content->id }}" method="post">
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
    </div>
</div>
@endsection

@section('scripts')

@endsection
