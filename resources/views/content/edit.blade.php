@extends('layouts.app')

@section('title')
Content | KMS
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Content</h4>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        <form method="POST" action="/usercontentedit/{{ $contents->id }}">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="content_name">Content Name</label>
                                <input type="text" name="content_name" class="form-control"
                                    value="{{ $contents->content_name }}" id="content_name">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" rows="5" id="description" name="description">
                                    {{ $contents->description }}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="category">{{_('Category') }}</label>
                                <select name="category" class="form-control" id="category">

                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id}}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <label for="date">Select Date</label>
                                <input type="date" class="form-control" name="date" id="datepicker"
                                    value="{{ $contents->date }}" required>
                            </div>

                            <!--Time picker -->
                            <div class="form-group">
                                <label for="timepicker">Select
                                    Time</label>
                                <input type="time" name="time" class="form-control" id="timepicker"
                                    value="{{ $contents->time }}" required>
                            </div>

                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="/usercontent" class="btn btn-danger">Cancel</a>
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
