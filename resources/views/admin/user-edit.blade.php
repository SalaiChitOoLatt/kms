@extends('layouts.master')


@section('title')
    Edit User | KMS
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Users</h4>
      </div>
      <div class="card-body">
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
              <th class="text-right">
                Action
              </th>
            </thead>
            <tbody>
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