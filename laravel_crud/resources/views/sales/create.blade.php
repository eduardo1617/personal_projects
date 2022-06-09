@extends('layouts.main')

@section('main')
    <h2>sale create</h2>
    @include('sales._partials.form')
    <a class="link-button" href="{{route('sales.index')}}">back</a>
@endsection
