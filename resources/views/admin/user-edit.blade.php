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
                  <label for="name">Name</label>
                <input type="text" class="form-control" value="{{ $users->name }}" id="name">
                </div>
                <div class="form-group">
                  <label for="usertype">User Type</label>
                  <select class="form-control" id="usertype">
                    <option value="normaluser">Normal User</option>
                    <option value="accountant">Accountant</option>
                    <option value="systemadministrator">SysAdmin</option>
                    <option value="hrmanager">HR Manager</option>
                    <option value="bdmanager">Business Development Manager</option>
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