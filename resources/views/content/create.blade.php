@extends('layouts.app')


@section('title')
Category | KMS
@endsection

@section('pagename')
Create Content
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create Content</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.content-create') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="content_name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Content Name') }}</label>

                            <div class="col-md-6">
                                <input id="cotent_name" type="text"
                                    class="form-control @error('content_name') is-invalid @enderror" name="content_name"
                                    value="" required autocomplete="content_name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description"
                                class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{_('Category') }}</label>
                            <div class="col-md-6">
                                <select name="category" class="form-control" id="category">

                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id}}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!--Date picker -->
                        <div class="form-group row ">
                            <label for="date" class="control-label col-md-4 col-form-label text-md-right"
                                for="datepicker">Select Date</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="date" id="datepicker" required>
                            </div>
                        </div>

                        <!--Time picker -->
                        <div class="form-group row pmd-textfield pmd-textfield-floating-label">
                            <label class="control-label col-md-4 col-form-label text-md-right" for="timepicker">Select
                                Time</label>
                            <div class="col-md-6">
                                <input type="time" name="time" class="form-control" id="timepicker" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Upload content
                                </button>
                                <a href="/usercontent" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')

<!-- Propeller textfield js -->
<script type="text/javascript" src="dist/js/propeller.min.js"></script>

<!-- Datepicker moment with locales -->
<script type="text/javascript" language="javascript" src="datetimepicker/js/moment-with-locales.js"></script>

<!-- Propeller Bootstrap datetimepicker -->
<script type="text/javascript" language="javascript" src="datetimepicker/js/bootstrap-datetimepicker.js"></script>

@endsection
