@extends('layouts.collection')

@section('show-collection')
    <div class="top-section-header-container">
        <div class="top-section-header container">
            <h2>Collections</h2>
            <div class="options">
                <a href="{{ route('collections.index') }}" class="current">Home</a>
                <span>/</span>
                <a href="#">Pages</a>
                <span>/</span>
                <a href="{{ route('collections.create') }}">New collection</a>
            </div>
        </div>
    </div>

    <div class="card-item-preview ">
        @each('collections._partials.collections_cards', $collections, 'collection')
    </div>
@endsection
