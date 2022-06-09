@extends('layouts.nft')

@section('edit-nft')
    <div class="top-section-header-container">
        <div class="top-section-header container">
            <h2>NFTs</h2>
            <div class="options">
                <a href="{{ route('nfts.index') }}">Home</a>
                <span>/</span>
                <a href="#">Pages</a>
                <span>/</span>
                <a href="{{ route('nfts.create') }}" class="current">New NFT</a>
            </div>
        </div>
    </div>
    @include('nfts._partials.form')
@endsection
