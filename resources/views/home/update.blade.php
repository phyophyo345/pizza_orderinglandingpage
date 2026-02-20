@extends('layouts.master')
@section('content')
    <div class="container form-control mx-6 my-5 w-50">
        <form action="{{ route('edit#category', $categories->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <img src="{{ asset('image/' . $categories->img) }}"width="50%" height="50%" id="output"
                class="mx-auto d-block">
            <input type="text" name="mainType" placeholder="Enter main type of pizza..." class="form-control my-2"
                value="{{ old('mainType', $categories->main_type) }}" required>
            <input type="text" name="subType" placeholder="Enter sub type of pizza...." class="form-control my-2"
                value="{{ old('subType', $categories->sub_type) }}" required>
            <textarea name="details" id="" cols="30" rows="10" class="form-control my-2"
                placeholder="Enter details...">{{ old('details', $categories->details) }}</textarea>
            <input type="file" name="image" id="" class="form-control my-2" onchange="loadFile(event)">
            <input type="text" name="size" class="form-control my-2" placeholder="Enter size of pizza...."
                value="{{ old('size', $categories->size) }}" required>
            <input type="text" name="price" class="form-control my-2" placeholder="Enter price of pizza...."
                value="{{ old('price', $categories->price) }}" required>
            <input type="submit" value="Update" class="btn btn-outline bg-danger text-white my-2">
            <a href="{{ url('/') }}" class="btn btn-outline bg-danger text-white">Close</a>
        </form>
    </div>
@endsection
