@extends('layouts.master')

@section('title')
    Dashboard | KMS
@endsection

@section('pagename')
    DASHBOARD    
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">ADMIN Dashboard</div>

              <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-primary" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif

                  You are logged in as <strong>ADMIN</strong>!
              </div>
          </div>
      </div>
  </div>
</div>
@endsection

@section('scripts')
    
@endsection