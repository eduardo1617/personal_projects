@extends('layouts.nft')

@section('show-nft')
    <div class="top-section-header-container">
        <div class="top-section-header container">
            <h2>NFTs</h2>
            <div class="options">
                <a href="{{ route('nfts.index') }}" class="current">Home</a>
                <span>/</span>
                <a href="#">Pages</a>
                <span>/</span>
                <a href="{{ route('nfts.create') }}">New NFT</a>
            </div>
        </div>
    </div>

    <div class="card-item-preview ">
    @each('nfts._partials.nfts_cards', $nfts, 'nft')
    </div>
@endsection


