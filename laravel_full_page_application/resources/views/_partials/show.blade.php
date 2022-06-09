@extends('layouts.gallery')

@php
    $liked = $nft->likes->firstWhere('user_id', Auth::id());
    $likes = $nft->likes->Where('likeable_id', $nft->id)->count();
    $views = $nft->views->Where('viewable_id', $nft->id)->count();

@endphp

@section('gallery-section')
    <div class="top-section-header-container">
        <div class="top-section-header container">
            <h2>NFT Details</h2>
            <div class="options">
                <a href="{{ route('nftsGallery.index') }}" >Explore</a>
                <span>/</span>
                <a href="#">Pages</a>
                <span>/</span>
                <a href="{{ route('nfts.show', $nft->id) }}" class="current">NFT Details</a>
            </div>
        </div>
    </div>

    <div class="item__details container">
        <div class="image__container">
            <img
                src="{{ asset('storage/'.$nft->img_path) }}"
                alt=""
                class="item__image"
            />
        </div>
        <div class="info__container">
            <h2 class="item__title">
                “{{ $nft->name }}”
            </h2>
            <div class="item__options">
                <div class="item__views">
                    <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.99998 4.20335C6.93597 4.20335 6.07117 5.00956 6.07117 6.00055C6.07117 6.9908 6.93597 7.79627 7.99998 7.79627C9.06399 7.79627 9.9296 6.9908 9.9296 6.00055C9.9296 5.00956 9.06399 4.20335 7.99998 4.20335ZM7.99992 8.91395C6.2743 8.91395 4.87109 7.60702 4.87109 6.00056C4.87109 4.39336 6.2743 3.08569 7.99992 3.08569C9.72553 3.08569 11.1295 4.39336 11.1295 6.00056C11.1295 7.60702 9.72553 8.91395 7.99992 8.91395Z" fill="white"/>
                        <mask id="mask0_605_1738" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="16" height="13">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0.000244141H16V12.0002H0V0.000244141Z" fill="white"/>
                        </mask>
                        <g mask="url(#mask0_605_1738)">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.2558 6.00006C2.74381 9.06172 5.25023 10.882 7.99985 10.8828C10.7495 10.882 13.2559 9.06172 14.7439 6.00006C13.2559 2.93915 10.7495 1.11884 7.99985 1.1181C5.25103 1.11884 2.74381 2.93915 1.2558 6.00006ZM8.00146 12.0003H7.99826H7.99746C4.68864 11.9981 1.71741 9.83801 0.0486004 6.22049C-0.0162001 6.07967 -0.0162001 5.92022 0.0486004 5.77939C1.71741 2.16262 4.68944 0.00255002 7.99746 0.000314692C7.99906 -0.000430418 7.99906 -0.000430418 7.99986 0.000314692C8.00146 -0.000430418 8.00146 -0.000430418 8.00226 0.000314692C11.3111 0.00255002 14.2823 2.16262 15.9511 5.77939C16.0167 5.92022 16.0167 6.07967 15.9511 6.22049C14.2831 9.83801 11.3111 11.9981 8.00226 12.0003H8.00146Z" fill="white"/>
                        </g>
                    </svg>
                    <span class="collection-likes">{{ $views }}</span>
                </div>
                <div class="item__likes">
                    <form class="card-likes-form" action="
                        {{ $liked
                        ? route('nfts.likes.destroy', ['like' => $liked, 'nft' => $nft->id])
                        : route('nfts.likes.store', ['nft' => $nft->id])}}"
                          method="post">
                        @csrf
                        @if($liked)
                            @method('DELETE')
                            <button type="submit">
                                <svg
                                    width="16"
                                    height="14"
                                    viewBox="-2 0 20 13"
                                    fill="red"
                                    xmlns="http://www.w3.org/2000/svg"
                                    stroke="red"
                                >
                                    <path
                                        d="M14.7145 1.64644C12.9744 -0.0932156 10.1436 -0.0932156 8.40393 1.64644L7.99986 2.05027L7.59603 1.64644C5.85637 -0.0934511 3.02531 -0.0934511 1.28565 1.64644C-0.418689 3.35078 -0.429756 6.05233 1.25998 7.93068C2.80114 9.64326 7.34643 13.3432 7.53928 13.4998C7.6702 13.6062 7.82773 13.658 7.98432 13.658C7.9895 13.658 7.99468 13.658 7.99963 13.6578C8.16163 13.6653 8.32481 13.6098 8.45997 13.4998C8.65282 13.3432 13.1986 9.64326 14.7402 7.93045C16.4297 6.05233 16.4186 3.35078 14.7145 1.64644ZM13.69 6.98551C12.4884 8.32039 9.18546 11.0735 7.99963 12.0505C6.8138 11.0737 3.51155 8.32086 2.31018 6.98574C1.13142 5.67558 1.12035 3.80971 2.28452 2.64554C2.87908 2.05122 3.6599 1.75382 4.44072 1.75382C5.22154 1.75382 6.00236 2.05098 6.59693 2.64554L7.48512 3.53374C7.59085 3.63947 7.72412 3.70257 7.86399 3.72471C8.09099 3.77345 8.33729 3.71011 8.51389 3.53398L9.40256 2.64554C10.5919 1.45665 12.5266 1.45689 13.7152 2.64554C14.8794 3.80971 14.8683 5.67558 13.69 6.98551Z"
                                        fill="red"
                                    />
                                </svg>
                                <span class="collection-likes">{{ $likes }}</span>
                            </button>
                        @else
                            <button type="submit">
                                <svg
                                    width="16"
                                    height="14"
                                    viewBox="-2 0 20 13"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M14.7145 1.64644C12.9744 -0.0932156 10.1436 -0.0932156 8.40393 1.64644L7.99986 2.05027L7.59603 1.64644C5.85637 -0.0934511 3.02531 -0.0934511 1.28565 1.64644C-0.418689 3.35078 -0.429756 6.05233 1.25998 7.93068C2.80114 9.64326 7.34643 13.3432 7.53928 13.4998C7.6702 13.6062 7.82773 13.658 7.98432 13.658C7.9895 13.658 7.99468 13.658 7.99963 13.6578C8.16163 13.6653 8.32481 13.6098 8.45997 13.4998C8.65282 13.3432 13.1986 9.64326 14.7402 7.93045C16.4297 6.05233 16.4186 3.35078 14.7145 1.64644ZM13.69 6.98551C12.4884 8.32039 9.18546 11.0735 7.99963 12.0505C6.8138 11.0737 3.51155 8.32086 2.31018 6.98574C1.13142 5.67558 1.12035 3.80971 2.28452 2.64554C2.87908 2.05122 3.6599 1.75382 4.44072 1.75382C5.22154 1.75382 6.00236 2.05098 6.59693 2.64554L7.48512 3.53374C7.59085 3.63947 7.72412 3.70257 7.86399 3.72471C8.09099 3.77345 8.33729 3.71011 8.51389 3.53398L9.40256 2.64554C10.5919 1.45665 12.5266 1.45689 13.7152 2.64554C14.8794 3.80971 14.8683 5.67558 13.69 6.98551Z"
                                        fill="white"
                                    />
                                </svg>
                                <span class="collection-likes">{{ $likes }}</span>
                            </button>
                        @endif
                    </form>
                </div>
            </div>
            <div class="item__owner__author">
                <div class="item__owner">
                    <div class="image--container">
                        <img
                            src="{{ asset('storage/'.$nft->owner->avatar) }}"
                            alt=""
                            class="avatar"
                        />
                    </div>
                    <div class="owner__info">
                        <span class="title">Owned By</span>
                        <h4 class="name">{{ $nft->owner->name }}</h4>
                    </div>
                </div>
                <div class="item__author">
                    <div class="image--container">
                        <img
                            src="{{ asset('storage/'.$nft->author->avatar) }}"
                            alt=""
                            class="avatar"
                        />
                    </div>
                    <div class="author__info">
                        <span class="title">Created By</span>
                        <h4 class="name">{{ $nft->author->name }}</h4>
                    </div>
                </div>
            </div>
            <div class="item__description">
                <p>{{ $nft->description }}</p>
            </div>
            <div class="item__price__time">
                <div class="price__time--info">
                    <span class="title">Current Bid</span>
                    <h4 class="description">{{ $nft->price }}ETH</h4>
                </div>
                <div class="price__time--info">
                    <span class="title"> Countdown </span>
                    <h4 class="description">{{ $nft->created_at->format('h:m:s') }}</h4>
                </div>
            </div>
            <div>
                <a href="{{ route('nftsGallery.index') }}" class="item__bid">
                    <svg
                        width="18"
                        height="16"
                        viewBox="0 0 18 16"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M13.8072 4.98483H17.3332C17.3332 2.15383 15.6369 0.5 12.7628 0.5H5.23688C2.3628 0.5 0.666504 2.15383 0.666504 4.94872V11.0513C0.666504 13.8462 2.3628 15.5 5.23688 15.5H12.7628C15.6369 15.5 17.3332 13.8462 17.3332 11.0513V10.7913H13.8072C12.1708 10.7913 10.8443 9.49793 10.8443 7.9025C10.8443 6.30707 12.1708 5.01372 13.8072 5.01372V4.98483ZM13.8072 6.22701H16.711C17.0546 6.22701 17.3332 6.49861 17.3332 6.83365V8.94247C17.3292 9.27588 17.0529 9.54521 16.711 9.54911H13.8739C13.0455 9.55998 12.3211 9.00698 12.1332 8.22027C12.0391 7.73191 12.1712 7.22797 12.4941 6.84351C12.817 6.45906 13.2976 6.2334 13.8072 6.22701ZM13.9332 8.44415H14.2072C14.5591 8.44415 14.8443 8.16608 14.8443 7.82306C14.8443 7.48004 14.5591 7.20197 14.2072 7.20197H13.9332C13.7649 7.20004 13.6028 7.26387 13.4832 7.3792C13.3635 7.49453 13.2961 7.65177 13.2961 7.81584C13.2961 8.16005 13.5802 8.44019 13.9332 8.44415ZM4.61465 4.98483H9.31835C9.67017 4.98483 9.95539 4.70676 9.95539 4.36375C9.95539 4.02073 9.67017 3.74266 9.31835 3.74266H4.61465C4.26569 3.74263 3.98167 4.01633 3.97761 4.35652C3.97759 4.70073 4.26163 4.98088 4.61465 4.98483Z"
                            fill="white"
                        />
                    </svg>
                    <h4>Back</h4>
                </a>
            </div>
        </div>
    </div>

@endsection
