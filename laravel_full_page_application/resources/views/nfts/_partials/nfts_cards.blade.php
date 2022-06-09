@php
    $liked = $nft->likes->firstWhere('user_id', Auth::id());
    $likes = $nft->likes->Where('likeable_id', $nft->id)->count();

@endphp

<div class="card" id="nft_{{ $nft->id }}">
    <div class="card-img-container">
        <img src="{{ asset('storage/'.$nft->img_path) }}" alt="" />
        <div class="card-likes">
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
        {{--        <div class="card-countdown">--}}
        {{--            <svg--}}
        {{--                width="16"--}}
        {{--                height="20"--}}
        {{--                viewBox="0 0 16 20"--}}
        {{--                fill="none"--}}
        {{--                xmlns="http://www.w3.org/2000/svg"--}}
        {{--            >--}}
        {{--                <path--}}
        {{--                    d="M9.87499 0C5.61278 2.4558 6.12499 9.375 6.12499 9.375C6.12499 9.375 4.25 8.74999 4.25 5.93751C2.01301 7.23465 0.5 9.72785 0.5 12.5C0.5 16.6421 3.85786 20 8.00001 20C12.1422 20 15.5 16.6421 15.5 12.5C15.5 6.40626 9.87499 5.15624 9.87499 0V0ZM8.6588 17.4157C7.1517 17.7915 5.62527 16.8744 5.24944 15.3672C4.87369 13.8601 5.79081 12.3336 7.298 11.9578C10.9366 11.0506 11.3926 9.00447 11.3926 9.00447C11.3926 9.00447 13.2071 16.2817 8.6588 17.4157Z"--}}
        {{--                    fill="#5142FC"--}}
        {{--                />--}}
        {{--            </svg>--}}
        {{--            <span>05 : 12 : 07 : 45</span>--}}
        {{--        </div>--}}
    </div>
    <div class="card-title">
        <h3>{{ $nft->name }}</h3>
        <button class="bsc-button">BSC</button>
    </div>
    <div class="card-information">
        <div class="card-information-user">
            <div class="card-information-user-img">
                <img src="{{ asset('storage/'.$nft->author->avatar) }}" alt="" />
            </div>
            <div class="card-information-user-creator">
                    <span class="small-heading"
                    >Creator</span
                    >
                <span>{{ $nft->author->name }}</span>
            </div>
        </div>
        <div class="card-information-bid">
                <span class="small-heading"
                >Current Bid</span
                >
            <span class="bid-price">{{ $nft->price.'eth' }}</span>
        </div>
    </div>
    <div class="card-footer">
        <a href="{{route('nfts.show', ['nft' => $nft->id])}}"
           class="left-button">
            View
        </a>
        <a href="{{route('nfts.edit', ['nft' => $nft->id])}}"
           class="left-button">
            Edit
        </a>
    </div>
</div>
