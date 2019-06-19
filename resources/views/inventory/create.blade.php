@extends('master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 align="center">Add Data</h3>
        <br />
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
        @endif
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{\Session::get('success')}}</p>
        </div>
        @endif
        <div align="right">
            <a href="{{route('inventory.index')}}" class="btn btn-primary">Back</a>
        </div>
        <br />
        <form method="post" action="{{url('inventory')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" name="barcode" class="form-control" placeholder="Enter Barcode" />
            </div>
            <div class="form-group">
                <input type="text" name="sku" class="form-control" placeholder="Enter SKU" />
            </div>
            <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="Enter Title" />
            </div>
            <div class="form-group">
                <input type="text" name="description" class="form-control" placeholder="Enter Description" />
            </div>
            <div class="form-group">
                <input type="text" name="price" class="form-control" placeholder="Enter Price" />
            </div>
            <div class="form-group">
                <input type="file" name="image" class="form-control" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>
@endsection