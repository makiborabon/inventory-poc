@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <br />
        <h3 align="center">Inventory Data</h3>
        <br />
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif 
        <div align="right">
            <a href="{{route('inventory.create')}}" class="btn btn-primary">Add</a>
            <br />
            <br />
        </div>
        <table class="table table-bordered">
            <tr>
                <th>BARCODE</th>
                <th>SKU</th>
                <th>TITLE</th>
                <th>DESCRIPTION</th>
                <th>PRICE</th>
                <th>IMAGE</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
            @foreach($inventory as $row)
            <tr>
                <td>{{$row['barcode']}}</td>
                <td>{{$row['sku']}}</td>
                <td>{{$row['title']}}</td>
                <td>{{$row['description']}}</td>
                <td>{{$row['price']}}</td>
                <td><img src="/images/{{ $row['image'] }}" class="img-thumbnail" width="75" /> </td>
                <td><a href="{{action('InventoryController@edit', $row['id'])}}">EDIT</a></td>
                <td>
                    <form method="post" class="delete_form" action="{{action('InventoryController@destroy', $row['id'])}}">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE" />
                    <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
<script>
$(document).ready(function(){
    $('.delete_form').on('submit', function(){
        if(confirm("Are you sure you want to delete it?"))
        {
            return true;
        }
        else
        {
            return false;
        }
    });
});
</script>

@endsection