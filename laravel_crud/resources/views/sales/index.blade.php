@extends('layouts.main')
@section('main')
    <a class="link-button" href="{{route('sales.create')}}">Add Sale</a>

    <table>
        <thead>
        <tr>
            <th>Full Name</th>
            <th>Product</th>
            <th>Branch</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        </thead>

        <tbody>
        {{--    es como un foreach, primer parametro la vista, segundo parametro los datos que estamos recibiendo,
            tercero nuestra fila--}}
        @each('sales._partials.sale_row', $sales, 'sale')
        </tbody>
    </table>
@endsection
