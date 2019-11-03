@extends('layouts.master')


@section('title')
Users | KMS
@endsection

@section('pagename')
Create Role
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create Role</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        @csrf

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
