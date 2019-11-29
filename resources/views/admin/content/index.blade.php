@extends('layouts.master')


@section('title')
Content | KMS
@endsection

@section('pagename')
Contents
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Content List</h4>
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
                            <a href="/content/downloadcsv" class="btn btn-info float-lg-left">Download as CSV</a>
                        </div>
                    </div>
                </div>

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
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($contents as $content)
                            <tr class="text-center">
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
                                <td>
                                    <form action="/content/delete/{{ $content->id }}" method="post">
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
