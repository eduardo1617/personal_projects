@extends('layouts.main')

@section('main')
    <h2>Product create</h2>
    @include('products._partials.form')
    <a class="link-button" href="{{route('products.index')}}">back</a>
@endsection
