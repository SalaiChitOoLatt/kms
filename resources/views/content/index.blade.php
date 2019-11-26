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
                                Content Name
                            </th>
                            <th>
                                Description
                            </th>
                            <th colspan="2">
                                Action
                            </th>
                        </thead>
                        <tbody>
                            {{-- @foreach ($roles as $role)
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
                            @endforeach --}}
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
