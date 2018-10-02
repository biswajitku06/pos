@extends('layouts.admin.master')

@section('title','Dashboard')
@section('after-style')

@endsection

@section('content')


    <div class="form-control">
        <h1>Add Product</h1>
    </div>

    <form class="form-horizontal" action="{{route('addProduct')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="control-group {{ $errors->has('name') ? 'has-danger' : '' }}">
            <label class="control-label form-control" for="focusedInput">Name : </label>
            <div class="controls form-control">
                <input class="input-xlarge focused" name="name" id="name" type="text" placeholder="Enter Product name…">
                <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
            </div>
        </div>

        <div class="control-group {{$errors->has('image')?'has-danger':' ' }}">
            <label class="control-label form-control" for="focusedInput">Image : </label>
            <div class="controls form-control">
                <input  name="image" id="image" type="file" class="input-xlarge focused">
                <span class="text-danger">{{$errors->has('image')? $errors->first('image'):' '}}</span>
            </div>
        </div>

        <div class="control-group {{$errors->has('price')?'has-danger':' ' }}">
            <label class="control-label form-control" for="focusedInput">Price : </label>
            <div class="controls form-control">
                <input class="input-xlarge focused" name="price" id="price" type="text">
                <span class="text-danger">{{$errors->has('price')? $errors->first('price'):' '}}</span>
            </div>
        </div>

        <div class="control-group {{$errors->has('quantity')?'has-danger':' ' }}">
            <label class="control-label form-control" for="focusedInput">Quantity : </label>
            <div class="controls form-control">
                <input class="input-xlarge focused" name="quantity" id="quantity" type="number">
                <span class="text-danger">{{$errors->has('quantity')? $errors->first('quantity'):' '}}</span>
            </div>
        </div>

        <div class="control-group {{ $errors->has('description') ? 'has-danger' : '' }}">
            <label class="control-label form-control" for="focusedInput">Description : </label>
            <div class="controls form-control">
                <textarea class="form-control" name="description"></textarea>
                <span class="text-danger">{{ $errors->has('description') ? $errors->first('description') : '' }}</span>
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

        <div class="control-group {{ $errors->has('cat_name') ? 'has-danger' : '' }}">
            <label class="control-label" for="selectError3">Category Name : </label>
            <div class="controls form-control">
                <select id="selectError3" name="cat_name">
                    <option value="">Select Category</option>
                    @if($items[0])
                        @foreach($items as $item)
                            <option value="{{$item->id}}">{{$item->cat_name}}</option>
                        @endforeach
                    @endif
                </select>
                <span class="text-danger">{{ $errors->has('cat_name') ? $errors->first('cat_name') : '' }}</span>
            </div>
        </div>


        <div class="control-group {{ $errors->has('brand_name') ? 'has-danger' : '' }}">
            <label class="control-label" for="selectError3">Brand Name : </label>
            <div class="controls form-control">
                <select id="selectError3" name="brand_name">
                    <option value="">Select Brand</option>
                    @if($items1[0])
                        @foreach($items1 as $item)
                            <option value="{{$item->id}}">{{$item->brand_name}}</option>
                        @endforeach
                    @endif
                </select>
                <span class="text-danger">{{ $errors->has('brand_name') ? $errors->first('brand_name') : '' }}</span>
            </div>
        </div>

        <div class="form-group form-actions">

            <button type="submit" class="btn btn-success">Add Product</button>
            <button type="reset" class="btn btn-danger" id="cancel">Cancel</button>

        </div>

    </form>




@endsection

@section('script')

@endsection