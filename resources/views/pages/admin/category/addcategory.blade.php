@extends('layouts.admin.master')

@section('title','Dashboard')
@section('after-style')

@endsection

@section('content')


    <div class="form-control">
        <h1>Add Category</h1>
    </div>

    <form class="form-horizontal" action="{{route('addCategory')}}" method="post">
        {{ csrf_field() }}

        <div class="control-group {{ $errors->has('name') ? 'has-danger' : '' }}">
            <label class="control-label form-control" for="focusedInput">Name : </label>
            <div class="controls form-control">
                <input class="input-xlarge focused" name="name" id="name" type="text" placeholder="Enter Category name…">
                <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
            </div>
        </div>

        <div class="control-group {{ $errors->has('description') ? 'has-danger' : '' }}">
            <label class="control-label form-control" for="focusedInput">Description : </label>
            <div class="controls form-control">
                <textarea class="form-control" name="description"></textarea>
                <span class="text-danger">{{ $errors->has('description') ? $errors->first('description') : '' }}</span>
            </div>
        </div>

        <div class="control-group {{ $errors->has('status') ? 'has-danger' : '' }}">
            <label class="control-label" for="selectError3">Status : </label>
            <div class="controls form-control">
                <select id="selectError3" name="status">
                    <option value="">Select Status</option>
                    <option value="1">Active</option>
                    <option value="0">InActive</option>
                </select>
                <span class="text-danger">{{ $errors->has('status') ? $errors->first('status') : '' }}</span>

            </div>
        </div>

        <div class="form-group form-actions">

            <button type="submit" class="btn btn-success">Add Category</button>
            <button type="reset" class="btn btn-danger" id="cancel">Cancel</button>

        </div>

    </form>




@endsection

@section('script')

@endsection