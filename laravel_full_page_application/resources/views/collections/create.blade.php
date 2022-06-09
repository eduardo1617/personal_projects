@extends('layouts.collection')

@section('create-collection')

    <div class="top-section-header-container">
        <div class="top-section-header container">
            <h2>Collections</h2>
            <div class="options">
                <a href="{{ route('collections.index') }}">Home</a>
                <span>/</span>
                <a href="#">Pages</a>
                <span>/</span>
                <a href="{{ route('collections.create') }}"
                   class="current">New collection</a>
            </div>
        </div>
    </div>

    @include('collections._partials.form')
@endsection
