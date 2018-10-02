@extends('layouts.admin.master')

@section('title','Dashboard')
@section('after-style')

@endsection

@section('content')


    <div class="form-control">
        <h1>Add Brand</h1>
    </div>

    <form class="form-horizontal" action="{{route('addBrand')}}" method="post">
        {{ csrf_field() }}

                <div class="control-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                    <label class="control-label form-control" for="focusedInput">Name : </label>
                    <div class="controls form-control">
                        <input class="input-xlarge focused" name="name" id="name" type="text" placeholder="Enter Brand name…">
                        <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="selectError3">Status : </label>
                    <div class="controls form-control">
                        <select id="selectError3" name="status">
                            <option>Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">InActive</option>
                        </select>
                    </div>
                </div>

                <div class="form-group form-actions">

                    <button type="submit" class="btn btn-success">Add Brand</button>
                    <button type="reset" class="btn btn-danger" id="cancel">Cancel</button>

                </div>

    </form>




@endsection

@section('script')

@endsection