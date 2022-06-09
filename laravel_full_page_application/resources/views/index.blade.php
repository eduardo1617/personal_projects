@extends('layouts.main')

@section('hero')
    <div class="hero-container container">
        <div class="hero-left-side">
            <h1>
                Discover, find, <br />
                <strong class="gradient-color">Sell extraordinary</strong>
                <br />
                Monster NFTs
            </h1>
            <span
            >Marketplace for monster character collections non-fungible
                    token NFTs</span
            >
            <div class="hero-buttons-container">
                <a href="{{ route('nftsGallery.index') }}" class="left-button">
                    <svg
                        width="16"
                        height="21"
                        viewBox="0 0 16 21"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M11.5018 14.208L12.7719 12.0081C15.6056 7.09999 15.241 2.93672 14.9644 1.41039C14.9351 1.24485 14.8342 1.10183 14.6899 1.01705C14.5447 0.932506 14.3707 0.916005 14.2117 0.971336C12.7383 1.48437 8.90813 3.22727 6.07185 8.13984L4.80142 10.3403L4.23711 10.3794C3.14896 10.4556 2.16906 11.0678 1.6233 12.0131L0.107343 14.6388C0.0175633 14.7943 0.0203744 14.9876 0.114687 15.1409C0.209878 15.294 0.381355 15.3818 0.560862 15.3695L2.38816 15.2526C2.90103 15.2202 3.41204 15.3391 3.85737 15.5962L4.82773 16.1565L4.09308 17.4289C3.95793 17.663 4.03802 17.9619 4.27155 18.0968L5.04851 18.5454C5.28205 18.6802 5.58096 18.6001 5.71611 18.366L6.45076 17.0935L7.42057 17.6535C7.8659 17.9106 8.22557 18.2929 8.45358 18.7552L9.26515 20.395C9.34426 20.5566 9.50608 20.6612 9.68622 20.6671C9.86613 20.6721 10.035 20.5779 10.1248 20.4223L11.6407 17.7966C12.1858 16.8525 12.2255 15.6975 11.7486 14.7162L11.5018 14.208ZM10.142 8.82732C9.33605 8.36201 9.05917 7.33044 9.52448 6.5245C9.99011 5.718 11.0216 5.44256 11.8275 5.90787C12.6329 6.37286 12.9101 7.40387 12.4445 8.21037C11.9792 9.01631 10.9474 9.29231 10.142 8.82732Z"
                            fill="white"
                        />
                    </svg>
                    Explore
                </a>
                <a class="right-button" href="{{ route('collections.create') }}">
                    <svg
                        width="20"
                        height="20"
                        viewBox="0 0 20 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M0.00889133 14.3331C-0.0180618 14.4861 0.016821 14.6436 0.105962 14.7709C0.195063 14.8982 0.331157 14.9849 0.484204 15.0118L3.08487 15.4704L1.44663 6.17929L0.00889133 14.3331Z"
                            fill="#5142FC"
                        />
                        <path
                            d="M3.13295 0.00947145C2.97955 -0.0183801 2.82127 0.0159949 2.69326 0.105057C2.56529 0.194159 2.47807 0.330604 2.451 0.484198L1.82959 4.00842L13.6528 1.92365L3.13295 0.00947145Z"
                            fill="#5142FC"
                        />
                        <path
                            d="M19.9912 16.8704L17.5493 3.02157C17.4931 2.7029 17.1893 2.49024 16.8705 2.5463L3.02166 4.98821C2.70299 5.04438 2.49017 5.34829 2.54635 5.66696L4.98826 19.5158C5.01525 19.6689 5.10193 19.8049 5.22923 19.8941C5.32841 19.9635 5.44587 20 5.56533 20C5.59919 20 5.63326 19.9971 5.66704 19.9911L19.5159 17.5492C19.6689 17.5223 19.805 17.4356 19.8941 17.3083C19.9833 17.181 20.0182 17.0235 19.9912 16.8704ZM5.66845 9.8763C5.61228 9.55763 5.82509 9.25372 6.14376 9.19755L15.3764 7.56958C15.6953 7.51341 15.999 7.72618 16.0552 8.04485C16.1113 8.36352 15.8985 8.66743 15.5798 8.7236L6.34724 10.3516C6.31282 10.3577 6.27857 10.3606 6.24482 10.3606C5.96579 10.3606 5.71857 10.1606 5.66845 9.8763ZM13.3163 13.8826L7.16122 14.9679C7.12681 14.974 7.09255 14.9769 7.0588 14.9769C6.77978 14.9769 6.53255 14.7769 6.48243 14.4926C6.42626 14.1739 6.63907 13.87 6.95775 13.8138L13.1128 12.7285C13.4317 12.6723 13.7354 12.8851 13.7916 13.2038C13.8477 13.5225 13.6349 13.8264 13.3163 13.8826ZM15.9868 11.0318L6.75419 12.6597C6.71978 12.6658 6.68552 12.6687 6.65177 12.6687C6.37275 12.6687 6.12552 12.4687 6.0754 12.1844C6.01923 11.8658 6.23204 11.5618 6.55071 11.5057L15.7833 9.8777C16.1022 9.82153 16.4059 10.0343 16.4621 10.353C16.5183 10.6717 16.3055 10.9756 15.9868 11.0318Z"
                            fill="#5142FC"
                        />
                    </svg>
                    Create
                </a>
            </div>
        </div>
    </div>
@endsection

@section('main')
    <div class="main-container container">
        <main>
            <section class="live-auctions-section sections">
                <div class="top-section">
                    <h2>Live Auctions</h2>
                    <a href="{{ route('nftsGallery.index') }}">explore more</a>
                </div>

                <div class="live-auctions-cards-container">

                    <div class="live-auctions-cards">
                        @each('._partials.nft_cards', $nfts, 'nft')
                    </div>
                </div>

                <div class="next-pre-card">
                    <button class="left-row">
                        <svg
                            width="14"
                            height="14"
                            viewBox="0 0 14 14"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M12.6667 7H1"
                                stroke="white"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M6.83333 12.8337L1 7.00033L6.83333 1.16699"
                                stroke="white"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </button>
                    <div class="slide-btn-container"></div>
                    <button class="right-row">
                        <svg
                            width="14"
                            height="14"
                            viewBox="0 0 14 14"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M1 7H12.6667"
                                stroke="white"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M6.83301 1.16699L12.6663 7.00033L6.83301 12.8337"
                                stroke="white"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </button>
                </div>
            </section>

            <section class="top-seller-section sections">
                <div class="top-section">
                    <h2>Top Seller</h2>
                    <div class="top-seller-page-buttons">
                        <button class="pre-button">
                            <svg
                                width="12"
                                height="20"
                                viewBox="0 0 12 20"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M0.444197 9.2196L9.34445 0.31951C9.5503 0.113495 9.8251 0 10.1181 0C10.4111 0 10.6859 0.113495 10.8918 0.31951L11.5472 0.974789C11.9737 1.40178 11.9737 2.09576 11.5472 2.52209L4.07344 9.99585L11.5555 17.4779C11.7613 17.6839 11.875 17.9586 11.875 18.2514C11.875 18.5446 11.7613 18.8192 11.5555 19.0254L10.9 19.6805C10.694 19.8865 10.4194 20 10.1264 20C9.83339 20 9.5586 19.8865 9.35274 19.6805L0.444197 10.7723C0.237857 10.5656 0.124525 10.2897 0.125175 9.99634C0.124525 9.70187 0.237857 9.4261 0.444197 9.2196Z"
                                    fill="white"
                                />
                            </svg>
                        </button>
                        <button class="next-button">
                            <svg
                                width="12"
                                height="20"
                                viewBox="0 0 12 20"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M11.5558 9.2196L2.65555 0.31951C2.4497 0.113495 2.1749 0 1.8819 0C1.58889 0 1.3141 0.113495 1.10824 0.31951L0.452802 0.974789C0.0263017 1.40178 0.0263017 2.09576 0.452802 2.52209L7.92656 9.99585L0.44451 17.4779C0.238658 17.6839 0.125 17.9586 0.125 18.2514C0.125 18.5446 0.238658 18.8192 0.44451 19.0254L1.09995 19.6805C1.30597 19.8865 1.5806 20 1.8736 20C2.16661 20 2.4414 19.8865 2.64726 19.6805L11.5558 10.7723C11.7621 10.5656 11.8755 10.2897 11.8748 9.99634C11.8755 9.70187 11.7621 9.4261 11.5558 9.2196Z"
                                    fill="#5142FC"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="top-seller-items-container">
                    @each('._partials.top_seller', $users, 'user')
                </div>
            </section>

            <section class="todays-picks-section sections">
                <div class="top-section">
                    <h2>Today's Picks</h2>
                    <a href="{{ route('nftsGallery.index') }}">explore more</a>
                </div>
                <div class="todays-picks-cards">
                    @each('._partials.nft_cards', $random_nfts->take(4), 'nft')
                </div>
                <div class="more-button-container">
                    <button type="submit" class="load-more-button">
                        Load more
                    </button>
                </div>
            </section>

            <section class="popular-collection-section sections">
                <div class="top-section">
                    <h2>Popular Collection</h2>
                    <a href="#">explore more</a>
                </div>
                <div class="popular-collections-card-container">
                    @each('._partials.nft_collections_cards', $collections, 'collection')

                </div>
            </section>
            <section class="create-sell-section sections">
                <div class="top-section">
                    <h2>Create and sell your NFTs</h2>
                </div>

                <div class="create-sell-list">
                    <div class="set-wallet list-container">
                        <div class="set-wallet-top">
                            <div class="icon-container blue">
                                <svg
                                    width="24"
                                    height="21"
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
                            </div>
                        </div>
                        <div class="set-wallet-bottom">
                            <h3>Set up your wallet</h3>
                            <p>
                                Wallet that is functional for NFT
                                purchasing. You may have a Coinbase account
                                at this point, but very few are actually set
                                up to buy an NFT.
                            </p>
                        </div>
                    </div>

                    <div class="create-collection list-container">
                        <div class="create-collection-top">
                            <div class="icon-container green">
                                <svg
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M7.10396 0H3.04798C1.36799 0 0 1.37999 0 3.07318V7.16396C0 8.86795 1.36799 10.2359 3.04798 10.2359H7.10396C8.79595 10.2359 10.1519 8.86795 10.1519 7.16396V3.07318C10.1519 1.37999 8.79595 0 7.10396 0Z"
                                        fill="white"
                                    />
                                    <path
                                        d="M7.10396 13.7637H3.04798C1.36799 13.7637 0 15.1329 0 16.8369V20.9276C0 22.6196 1.36799 23.9996 3.04798 23.9996H7.10396C8.79595 23.9996 10.1519 22.6196 10.1519 20.9276V16.8369C10.1519 15.1329 8.79595 13.7637 7.10396 13.7637Z"
                                        fill="white"
                                    />
                                    <path
                                        d="M20.9521 0H16.8961C15.2041 0 13.8481 1.37999 13.8481 3.07318V7.16396C13.8481 8.86795 15.2041 10.2359 16.8961 10.2359H20.9521C22.6321 10.2359 24.0001 8.86795 24.0001 7.16396V3.07318C24.0001 1.37999 22.6321 0 20.9521 0Z"
                                        fill="white"
                                        fill-opacity="0.4"
                                    />
                                    <path
                                        d="M20.9521 13.7637H16.8961C15.2041 13.7637 13.8481 15.1329 13.8481 16.8369V20.9276C13.8481 22.6196 15.2041 23.9996 16.8961 23.9996H20.9521C22.6321 23.9996 24.0001 22.6196 24.0001 20.9276V16.8369C24.0001 15.1329 22.6321 13.7637 20.9521 13.7637Z"
                                        fill="white"
                                    />
                                </svg>
                            </div>
                        </div>
                        <div class="create-collection-bottom">
                            <h3>Create your collection</h3>
                            <p>
                                Setting up your NFT collection and creating
                                NFTs on NFTs is easy! This guide explains
                                how to set up your first collection
                            </p>
                        </div>
                    </div>

                    <div class="add-nft list-container">
                        <div class="add-nft-top">
                            <div class="icon-container purple">
                                <svg
                                    width="20"
                                    height="20"
                                    viewBox="0 0 20 20"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M1.39602 5.88809C1.39602 3.16209 3.06102 1.39509 5.63802 1.39509H14.354C16.94 1.39509 18.605 3.16209 18.605 5.88809V11.1901C18.159 10.8121 16.812 9.87109 16.624 9.75909C15.224 8.91909 13.544 9.29909 12.454 10.7191C12.359 10.8441 10.782 13.1441 10.224 13.4881C10.095 13.5681 9.95902 13.6111 9.81402 13.6311C9.46402 13.6611 9.12702 13.4811 8.55402 13.0981C8.22402 12.8881 7.86402 12.6491 7.45402 12.4791C5.74902 11.7661 4.45002 12.9441 3.75802 13.7341C3.74902 13.7421 1.81202 16.1041 1.78102 16.1411C1.53802 15.5501 1.39602 14.8671 1.39602 14.1021V5.88809ZM20 5.888C20 2.362 17.731 0 14.354 0H5.638C2.271 0 0 2.362 0 5.888V14.102C0 15.674 0.447 17.013 1.238 18.009C1.247 18.018 1.247 18.028 1.256 18.028C2.043 19.013 3.166 19.666 4.519 19.899C4.531 19.901 4.543 19.903 4.556 19.905C4.903 19.962 5.262 20 5.638 20H14.354C14.535 20 14.7 19.966 14.874 19.953C15.078 19.936 15.289 19.932 15.483 19.898C15.74 19.854 15.976 19.777 16.215 19.703C16.319 19.67 16.43 19.65 16.53 19.612C16.773 19.52 16.996 19.401 17.217 19.279C17.297 19.235 17.383 19.199 17.461 19.15C17.678 19.014 17.875 18.855 18.068 18.689C18.132 18.634 18.201 18.584 18.262 18.526C18.45 18.347 18.616 18.15 18.775 17.944C18.824 17.879 18.876 17.819 18.923 17.752C19.076 17.534 19.208 17.299 19.33 17.054C19.364 16.983 19.4 16.914 19.433 16.842C19.546 16.585 19.64 16.316 19.72 16.034C19.741 15.958 19.762 15.883 19.78 15.805C19.851 15.514 19.902 15.214 19.935 14.9C19.939 14.862 19.95 14.827 19.954 14.789C19.961 14.704 19.96 14.619 19.965 14.534C19.973 14.388 20 14.253 20 14.102V5.888Z"
                                        fill="white"
                                    />
                                    <path
                                        d="M6.50533 8.99951C7.86677 8.99951 9.00049 7.86942 9.00049 6.51447C9.00049 5.83506 8.7156 5.2126 8.26115 4.76095C7.80863 4.29289 7.17685 3.99951 6.47917 3.99951C5.10902 3.99951 4.00049 5.10355 4.00049 6.46815C4.00049 6.64861 4.02181 6.82329 4.0596 6.99314C4.28828 8.12516 5.30863 8.99951 6.50533 8.99951Z"
                                        fill="white"
                                        fill-opacity="0.4"
                                    />
                                </svg>
                            </div>
                        </div>
                        <div class="add-nft-bottom">
                            <h3>Add your NFTs</h3>
                            <p>
                                Sed ut perspiciatis un de omnis iste natus
                                error sit voluptatem accusantium doloremque
                                laudantium, totam rem.
                            </p>
                        </div>
                    </div>

                    <div class="list-nft list-container">
                        <div class="list-nft-top">
                            <div class="icon-container red">
                                <svg
                                    width="20"
                                    height="24"
                                    viewBox="0 0 20 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M6.125 0H13.8375C17.225 0 19.9625 1.28395 20 4.54782V22.7631C20 22.9671 19.95 23.1711 19.85 23.3511C19.6875 23.6391 19.4125 23.8551 19.075 23.9511C18.75 24.0471 18.3875 23.9991 18.0875 23.8311L9.9875 19.9432L1.875 23.8311C1.68875 23.9259 1.475 23.9871 1.2625 23.9871C0.5625 23.9871 0 23.4351 0 22.7631V4.54782C0 1.28395 2.75 0 6.125 0ZM5.27529 9.14372H14.6878C15.2253 9.14372 15.6628 8.72254 15.6628 8.19576C15.6628 7.66778 15.2253 7.24779 14.6878 7.24779H5.27529C4.73779 7.24779 4.30029 7.66778 4.30029 8.19576C4.30029 8.72254 4.73779 9.14372 5.27529 9.14372Z"
                                        fill="white"
                                    />
                                </svg>
                            </div>
                        </div>
                        <div class="list-nft-bottom">
                            <h3>List them for sale</h3>
                            <p>
                                Choose between auctions, fixed-price
                                listings, and declining-price listings. You
                                choose how you want to sell your NFTs!
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
@endsection
