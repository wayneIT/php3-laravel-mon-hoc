{-- Home se ke thua view master --}}
@extends('layout.master')

{{-- section se thay doi
phan yield trong master
voi ten tuong ung --}}
@section('title', 'Product page')

@section('content-title', 'Product page')

@section('content')
<div>
    <a href="">
        <button class="btn btn-primary">Create</button>
    </a>
</div>
<table class="table table-hover">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Shorts Description</th>
        <th>price</th>
        <th>Thumbnail_url</th>
        <th>Quantity</th>
        <th>Status</th>
        <th>category id</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th>Actions</th>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description ?: 'N/A' }}</td>
            <td>{{ $product->shorts_description ?: 'N/A' }}</td>
            <td>{{ $product->price ?: 'N/A' }}</td>
            <td>{{ $product->thumbnail_url ?: 'N/A' }}</td>
            <td>{{ $product->quantity ?: 'N/A' }}</td>
            <td>{{ $product->status == 1 ? 'Active' : 'Deactive' }}</td>
            <td>{{ $product->category_id ?: 'N/A' }}</td>
            <td>{{ $product->created_at ?: 'N/A' }}</td>
            <td>{{ $product->updated_at ?: 'N/A' }}</td>
            <td>
                <a href="" class="btn btn-warning">Edit</a>
                <form action="{{route('products.delete', $product->id)}}" method="POST">
                    @method('DELETE')
                    {{-- <input type="text" name="_method" value="DELETE"> --}}
                    @csrf
                    {{-- <input type="text" name="csrf_token" value="asdadasd"> --}}
                    <button type="submit" class="btn btn-danger">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $products->links() }}
@endsection