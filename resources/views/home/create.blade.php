@extends('layouts.master')
@section('content')
    <div class="container form-control mx-6 my-5 w-50">
        <form action="{{ route('create#pizza') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="mainType" placeholder="Enter main type of pizza..." class="form-control my-2" required>
            <input type="text" name="subType" placeholder="Enter sub type of pizza...." class="form-control my-2" required>
            <textarea name="details" id="" cols="30" rows="10" class="form-control my-2"
                placeholder="Enter details..."></textarea>
            <input type="file" name="image" id="" class="form-control my-2" required>
            <input type="text" name="price" class="form-control my-2" placeholder="Enter price of pizza...." required>
            <input type="submit" value="Create" class="btn btn-outline bg-danger text-white my-2">
            <a href="{{ url('/') }}" class="btn btn-outline bg-danger text-white">Close</a>
        </form>
    </div>
@endsection
