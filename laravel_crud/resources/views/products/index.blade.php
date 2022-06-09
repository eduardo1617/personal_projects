@extends('layouts.main')
@section('main')
    <a class="link-button" href="{{route('products.create')}}">Add Products</a>
    <table>
        <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Category</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
{{--    es como un foreach, primer parametro la vista, segundo parametro los datos que estamos recibiendo,
    tercero nuestra fila--}}
            @each('products._partials.product_row', $products, 'product')
        </tbody>
    </table>
@endsection
