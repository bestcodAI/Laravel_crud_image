@extends('products.layout')

@section('content')
    <div class="row mb-3">
        <div class="col-lg-12 margin-tb">
            <div class="pull-lef">
                <h2>Crud Products</h2>
            </div>
            <div class="pull-right ">
                <a  class="btn btn-success " href="{{ route('products.create') }}">Create New products</a>
            </div>
        </div>
    </div>
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    </br>
    <table class="table table-bordered">
        <tr class="bg-primary">
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Details</th>
            <th width="217px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="images/{{ $product->image }}" width="150px"></td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail}}</td>
            <td>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    <a  class="btn btn-primary btn-sm" href="{{ route('products.show',$product->id) }}">Show</a>
                    <a class="btn btn-warning btn-sm" href="{{ route('products.edit', $product->id) }}">Edite</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm ">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $products->links() }}
@endsection
