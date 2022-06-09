@extends('layouts.main')
@section('main')
    <a class="link-button" href="{{route('sellers.create')}}">Add Sellers</a>

    <table>
        <thead>
        <tr>
            <th>Full Name</th>
            <th>DNI</th>
            <th>Phone</th>
            <th>Hiring date</th>
            <th>Carnet</th>
            <th>Branch</th>
            <th>status</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
{{--    es como un foreach, primer parametro la vista, segundo parametro los datos que estamos recibiendo,
    tercero nuestra fila--}}
            @each('sellers._partials.seller_row', $sellers, 'seller')
        </tbody>
    </table>
@endsection
