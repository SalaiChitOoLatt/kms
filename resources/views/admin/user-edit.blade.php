@extends('layouts.master')


@section('title')
Edit User | KMS
@endsection

@section('pagename')
USER LIST
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Edit User</div>
            <div class="card-body">
                <div class="col-md-6">
                    <form method="POST" action="/userupdate/{{ $users->id }}">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="username">Name</label>
                            <input type="text" name="username" class="form-control" value="{{ $users->name }}"
                                id="username">
                        </div>
                        <div class="form-group">
                            <label for="usertype">User Type</label>
                            <select name="usertype" class="form-control" id="usertype">
                                <option value="Normal User">Normal User</option>
                                <option value="Accountant">Accountant</option>
                                <option value="System Administrator">SysAdmin</option>
                                <option value="HR Manager">HR Manager</option>
                                <option value="BD Manager">Business Development Manager</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="/admin/users" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
