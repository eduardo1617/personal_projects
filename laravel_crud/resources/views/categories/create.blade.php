@extends('layouts.main')

@section('main')
    <h2>category create</h2>
    @include('categories._partials.form')
    <a class="link-button" href="{{route('categories.index')}}">back</a>
@endsection
