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
                <h4 class="card-title">Category List</h4>
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
                            <a href="/category/create" class="btn btn-success float-lg-right">
                                Create New Category
                            </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                Category Name
                            </th>
                            <th>
                                Description
                            </th>
                            <th colspan="2">
                                Action
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>
                                    {{ $category->category_name}}
                                </td>
                                <td>
                                    <p class="text-justify w-70 px-3">
                                        {{ $category->description }}
                                    </p>
                                </td>
                                <td class="text-right">
                                    <a href="#" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="#" method="post">
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
