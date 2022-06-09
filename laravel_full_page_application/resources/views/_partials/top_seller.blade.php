
    <div class="top-seller-item">
        <div class="item-img-container">
            <img src="{{ asset('storage/'.$user->avatar) }}" alt="" />
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
        <div class="item-data">
            <h3>{{ $user->name }}</h3>
            <span class="price">{{ $user->nfts->sum('price') }} ETH</span>
        </div>
    </div>

