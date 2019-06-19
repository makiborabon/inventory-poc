@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <br />
        <h3>EDIT RECORD</h3>
        <br />
        @if(count($errors) > 0)

        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        @endif
        <form method="post" action="{{action('InventoryController@update', $id)}}">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH" />
            <div class="form-group">
                <input type="text" name="barcode" class="form-control" value="{{$inventory->barcode}}" placeholder="Enter Barcode" />
            </div>
            <div class="form-group">
                <input type="text" name="sku" class="form-control" value="{{$inventory->sku}}" placeholder="Enter SKU" />
            </div>
            <div class="form-group">
                <input type="text" name="title" class="form-control" value="{{$inventory->title}}" placeholder="Enter Title" />
            </div>
            <div class="form-group">
                <input type="text" name="description" class="form-control" value="{{$inventory->description}}" placeholder="Enter Description" />
            </div>
            <div class="form-group">
                <input type="text" name="price" class="form-control" value="{{$inventory->price}}" placeholder="Enter Price" />
            </div>
            <div class="form-group">
                <input type="file" name="image" class="form-control" value="{{$inventory->image}}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="EDIT" />
            </div>
        </form>
    </div>
</div>

@endsection