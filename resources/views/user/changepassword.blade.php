@extends('layouts.app')

@section('title')
Content | KMS
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mx-2">
            <div class="card-header">
                <h4 class="card-title">Change Password</h4>
                @if (session('status'))
                <div class="alert alert-info" role="alert">
                    {{ session('status') }}
                </div>
                @endif
            </div>
            <div class="card-body">
                Change Password
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
