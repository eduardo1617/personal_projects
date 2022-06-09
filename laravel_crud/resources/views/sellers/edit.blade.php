@extends('layouts.main')

@section('main')
    <h2>edit</h2>
    @include('sellers._partials.form')
    <a class="link-button" href="{{route('sellers.index')}}">back</a>
@endsection
