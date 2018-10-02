@extends('layouts.admin.master')

@section('title','Dashboard')
@section('after-style')

@endsection

@section('content')


    <div class="form-control">
        <h1>Update Sub Category</h1>
    </div>

    <form class="form-horizontal" action="{{route('updatesubCategory')}}" method="post">
        {{ csrf_field() }}


        <div class="control-group {{ $errors->has('name') ? 'has-danger' : '' }}">
            <label class="control-label form-control" for="focusedInput">Name : </label>
            <div class="controls form-control">
                <input class="input-xlarge focused" name="name" id="name" type="text" @if(isset($items)) value=" {{$items->sub_cat_name}}" @else value="{{old('sub_cat_name')}}" @endif>
                <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
            </div>
        </div>


        <div class="control-group {{$errors->has('cat_name')?'has-danger':''}}">
            <label class="control-label" for="selectError3">Category Name : </label>
            <div class="controls form-control">
                <select id="selectError3" name="cat_name">
                    <option value="">Select Status</option>
                    <option @if(isset($items)) selected @endif value="{{$items->cat_id}}">{{$items->cat_name}}</option>

                </select>
                <span class="text-danger">{{ $errors->has('cat_name') ? $errors->first('cat_name') : '' }}</span>
            </div>
        </div>


        <div class="form-group form-actions">
            @if(isset($items))<input type="hidden" name="edit_id" value="{{$items->id}}"> @endif
            <button type="submit" class="btn btn-success">Update Sub Category</button>
            <button type="reset" class="btn btn-danger" id="cancel">Cancel</button>

        </div>

    </form>




@endsection

@section('script')

@endsection