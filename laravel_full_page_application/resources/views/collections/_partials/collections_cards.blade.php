
<div class="popular-collection-card">
    <div class="card-heading">
        <div class="collection-img-container">
            <img src="{{ asset('storage/'.$collection->author->avatar) }}" alt="" />
            <div class="checked">
                <svg
                    width="16"
                    height="12"
                    viewBox="0 0 16 12"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M6.28014 11.3408C6.13989 11.4818 5.94864 11.5605 5.74989 11.5605C5.55114 11.5605 5.35989 11.4818 5.21964 11.3408L0.985143 7.10553C0.545643 6.66603 0.545643 5.95353 0.985143 5.51478L1.51539 4.98453C1.95489 4.54503 2.66664 4.54503 3.10614 4.98453L5.74989 7.62828L12.8936 0.484532C13.3331 0.0450322 14.0456 0.0450322 14.4844 0.484532L15.0146 1.01478C15.4541 1.45428 15.4541 2.16678 15.0146 2.60553L6.28014 11.3408Z"
                        fill="white"
                    />
                </svg>
            </div>
        </div>

        <div class="popular-collection-title">
            <h3>{{ $collection->name }}</h3>
            <div class="creator">
                <span class="small-heading">Created by</span>
                <span>{{ $collection->author->name }}</span>
            </div>
        </div>
        <div class="card-likes">
            @php
                $liked = $collection->likes->firstWhere('user_id', Auth::id());
                $likes = $collection->likes->Where('likeable_id', $collection->id)->count();
            @endphp
            <form class="card-likes-form" action="
                                {{ $liked
                                ? route('collections.likes.destroy', ['like' => $liked, 'collection' => $collection->id])
                                : route('collections.likes.store', ['collection' => $collection->id])}}"
                  method="post">
                @csrf
                @if($liked)
                    @method('DELETE')
                    <button type="submit">
                        <svg
                            width="16"
                            height="14"
                            viewBox="0 0 16 14"
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
                @else

                    <button type="submit">
                        <svg
                            width="16"
                            height="14"
                            viewBox="0 0 16 14"
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
    <div class="card-content">
        @foreach($collection->nfts->take(4) as $nft)
            <div>
                <img src="{{ asset('storage/'.$nft->img_path) }}" alt="">
            </div>
        @endforeach
    </div>
    <div class="card-footer">
        <a href="{{route('collections.edit', ['collection'=>$collection->id])}}"
           class="left-button hero-buttons-container">
            Edit
        </a>
    </div>
</div>
