@extends('layouts.main')

@section('main')
    <h2>branches create</h2>
    @include('branches._partials.form')
    <a class="link-button" href="{{route('branches.index')}}">back</a>
@endsection
