@extends('layouts.collection')

@section('edit-collection')
    <div class="top-section-header-container">
        <div class="top-section-header container">
            <h2>Collections</h2>
            <div class="options">
                <a href="{{ route('collections.index') }}">Home</a>
                <span>/</span>
                <a href="#"
                   class="current">Edit</a>
                <span>/</span>
                <a href="{{ route('collections.create') }}">New collection</a>
            </div>
        </div>
    </div>
    @include('collections._partials.form')
@endsection
