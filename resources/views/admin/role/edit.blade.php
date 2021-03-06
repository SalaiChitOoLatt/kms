@extends('layouts.master')

@section('title')
Category | KMS
@endsection

@section('pagename')
Edit Category
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Role</h4>
                </div>
                <div class="card-body">
                        <div class="col-md-6">
                                <form method="POST" action="/roleedit/{{ $roles->id }}">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <div class="form-group">
                                        <label for="role_name">Category Name</label>
                                        <input type="text" name="role_name" class="form-control" value="{{ $roles->role_name }}"
                                            id="role_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" rows="5" id="description" name="description">
                                            {{ $roles->description }}
                                        </textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a href="/role" class="btn btn-danger">Cancel</a>
                                </form>
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
