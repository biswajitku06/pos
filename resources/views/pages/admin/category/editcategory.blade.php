@extends('layouts.admin.master')

@section('title','Dashboard')
@section('after-style')

@endsection

@section('content')


    <div class="form-control">
        <h1>Update Category</h1>
    </div>

    <form class="form-horizontal" action="{{route('updateCategory')}}" method="post">
        {{ csrf_field() }}


        <div class="control-group {{ $errors->has('name') ? 'has-danger' : '' }}">
            <label class="control-label form-control" for="focusedInput">Name : </label>
            <div class="controls form-control">
                <input class="input-xlarge focused" name="name" id="name" type="text" @if(isset($items)) value=" {{$items->cat_name}}" @else value="{{old('name')}}" @endif>
                <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label form-control" for="focusedInput">Name : </label>
            <div class="controls form-control">
                <textarea class="input-xlarge focused" name="description" id="name" type="text" @if(isset($items)) placeholder=" {{$items->description}}" @else value="{{old('description')}}" @endif></textarea>
                {{--<span class="text-danger">{{ $errors->has('description') ? $errors->first('description') : '' }}</span>--}}
            </div>
        </div>


        <div class="form-group form-actions">
            @if(isset($items))<input type="hidden" name="edit_id" value="{{$items->id}}"> @endif
            <button type="submit" class="btn btn-success">Update Category</button>
            <button type="reset" class="btn btn-danger" id="cancel">Cancel</button>

        </div>

    </form>




@endsection

@section('script')

@endsection