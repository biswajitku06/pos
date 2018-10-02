@extends('layouts.admin.master')

@section('title','Dashboard')
@section('after-style')

@endsection

@section('content')


    <div class="form-control">
        <h1>Update Product</h1>
    </div>

    <form class="form-horizontal" action="{{route('updateProduct')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="control-group {{ $errors->has('name') ? 'has-danger' : '' }}">
            <label class="control-label form-control" for="focusedInput">Name : </label>
            <div class="controls form-control">
                <input class="input-xlarge focused" name="name" id="name" type="text" @if(isset($items)) value="{{$items->name}}" @else value="{{old('name')}}"@endif>
                <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
            </div>
        </div>

        <div class="control-group {{$errors->has('image')?'has-danger':' ' }}">
            <label class="control-label form-control" for="focusedInput">Image : </label>
            <div class="controls form-control">
                <input  name="image" id="image" type="file" class="input-xlarge focused">
                <img
                        src="@if(isset($items)){{asset(path_image().'/'.$items->image)}} @endif"
                >
                <span class="text-danger">{{$errors->has('image')? $errors->first('image'):' '}}</span>
            </div>
        </div>

        <div class="control-group {{$errors->has('price')?'has-danger':' ' }}">
            <label class="control-label form-control" for="focusedInput">Price : </label>
            <div class="controls form-control">
                <input class="input-xlarge focused" name="price" id="price" type="text" @if(isset($items)) value="{{$items->price}}" @else value="{{old('price')}}"@endif>
                <span class="text-danger">{{$errors->has('price')? $errors->first('price'):' '}}</span>
            </div>
        </div>

        <div class="control-group {{$errors->has('quantity')?'has-danger':' ' }}">
            <label class="control-label form-control" for="focusedInput">Quantity : </label>
            <div class="controls form-control">
                <input class="input-xlarge focused" name="quantity" id="quantity" type="number" @if(isset($items)) value="{{$items->quantity}}" @else value="{{old('qunatity')}}"@endif>
                <span class="text-danger">{{$errors->has('quantity')? $errors->first('quantity'):' '}}</span>
            </div>
        </div>

        <div class="control-group {{ $errors->has('description') ? 'has-danger' : '' }}">
            <label class="control-label form-control" for="focusedInput">Description : </label>
            <div class="controls form-control">
                <textarea class="form-control" name="description" @if(isset($items)) placeholder="{{$items->description}}" @else placeholder="{{old('name')}}"@endif></textarea>
                <span class="text-danger">{{ $errors->has('description') ? $errors->first('description') : '' }}</span>
            </div>
        </div>

        <div class="control-group {{ $errors->has('cat_name') ? 'has-danger' : '' }}">
            <label class="control-label" for="selectError3">Category Name : </label>
            <div class="controls form-control">
                <select id="selectError3" name="cat_name">
                    <option value="">Select Category</option>

                    @foreach($items1 as $items1)
                        <option @if(isset($items) && $items->cat_id == $items1->id) selected @endif value="{{$items->cat_id}}">{{$items1->cat_name}}</option>
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->has('cat_name') ? $errors->first('cat_name') : '' }}</span>
            </div>
        </div>


        <div class="control-group {{ $errors->has('brand_name') ? 'has-danger' : '' }}">
            <label class="control-label" for="selectError3">Brand Name : </label>
            <div class="controls form-control">
                <select id="selectError3" name="brand_name">
                    <option value="">Select Brand</option>

                        @foreach($items2 as $items2)
                        <option @if(isset($items) && $items->brand_id == $items2->id) selected @endif value="{{$items->brand_id}}">{{$items2->brand_name}}</option>
                        @endforeach

                </select>
                <span class="text-danger">{{ $errors->has('brand_name') ? $errors->first('brand_name') : '' }}</span>
            </div>
        </div>

        <div class="form-group form-actions">
            @if(isset($items))<input type="hidden" name="edit_id" value="{{$items->id}}"> @endif
            <button type="submit" class="btn btn-success">Update Product</button>
            <button type="reset" class="btn btn-danger" id="cancel">Cancel</button>

        </div>

    </form>




@endsection

@section('script')

@endsection