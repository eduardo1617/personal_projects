@php
    $action = isset($nft)
    ? route('nfts.update',['nft' => $nft->id])
    : route('nfts.store');
    if (isset($nft->img_path)){
        $path = asset('storage/'.$nft->img_path);
    }else{
        $path='';
    }
@endphp

<div class="create-item-container container">
    <div class="create-item-preview">
        <h4>Preview item</h4>
        <div class="card">
            <div class="card-img-container">
                <img src="{{ $path }}" alt="" class="image__preview"/>
            </div>
            <div class="card-title">
                <h3 class="nft-title">{{ $nft->name ?? '' }}</h3>
                <button class="bsc-button">BSC</button>
            </div>
            <div class="card-information">
                <div class="card-information-user">
                    <div class="card-information-user-img">
                        <img src="{{ asset('storage/'.Auth::user()->avatar) }}" alt="" />
                    </div>
                    <div class="card-information-user-creator">
                        <span class="small-heading">Creator</span>
                        <span class="nft-creator">{{ $creator->name }}</span>
                    </div>
                </div>
                <div class="card-information-bid">
                    <span class="small-heading">Current Bid</span>
                    <span class="bid-price">{{ $nft->price ?? '' }}</span>
                </div>
            </div>
            <div class="card-options">
                <button class="place-bid">
                    <svg
                        width="18"
                        height="18"
                        viewBox="0 0 18 18"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M12.8756 4.39169H13.0553C15.4167 4.39169 17.3332 6.26669 17.3332 8.56669V13.1667C17.3332 15.4667 15.4167 17.3334 13.0553 17.3334H4.9444C2.583 17.3334 0.666504 15.4667 0.666504 13.1667V8.56669C0.666504 6.26669 2.583 4.39169 4.9444 4.39169H5.12407C5.14118 3.39169 5.5433 2.45835 6.27054 1.75835C7.00634 1.05002 7.94748 0.691687 9.00839 0.666687C11.1302 0.666687 12.8499 2.33335 12.8756 4.39169ZM7.16891 2.65002C6.68979 3.11669 6.42456 3.73335 6.40745 4.39169H11.5923C11.5666 3.02502 10.4201 1.91669 9.00841 1.91669C8.34961 1.91669 7.66515 2.17502 7.16891 2.65002ZM12.251 7.60002C12.6104 7.60002 12.8927 7.31669 12.8927 6.97502V6.00835C12.8927 5.66669 12.6104 5.38335 12.251 5.38335C11.9002 5.38335 11.6093 5.66669 11.6093 6.00835V6.97502C11.6093 7.31669 11.9002 7.60002 12.251 7.60002ZM6.3133 6.97502C6.3133 7.31669 6.03096 7.60002 5.67162 7.60002C5.32083 7.60002 5.02993 7.31669 5.02993 6.97502V6.00835C5.02993 5.66669 5.32083 5.38335 5.67162 5.38335C6.03096 5.38335 6.3133 5.66669 6.3133 6.00835V6.97502Z"
                            fill="#5142FC"
                        />
                    </svg>
                    Place Bid
                </button>
                <button class="view-history">
                    <svg
                        width="20"
                        height="20"
                        viewBox="0 0 20 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M16.7805 11.993C16.5496 11.8893 16.2869 11.8816 16.0503 11.9716C15.8137 12.0616 15.6225 12.2419 15.5188 12.4728C15.0506 13.5168 14.2958 14.4066 13.3421 15.0388C12.3884 15.671 11.275 16.0197 10.131 16.0443C8.98711 16.069 7.85965 15.7687 6.87959 15.1782C5.89954 14.5877 5.10709 13.7313 4.5943 12.7085L5.13492 12.9492C5.3662 13.0521 5.62892 13.059 5.86527 12.9683C6.10163 12.8776 6.29226 12.6967 6.39523 12.4654C6.49821 12.2341 6.50509 11.9714 6.41436 11.735C6.32363 11.4987 6.14273 11.308 5.91144 11.2051L3.39914 10.0866C3.28462 10.0356 3.16118 10.0076 3.03586 10.0044C2.91055 10.0011 2.78582 10.0225 2.66879 10.0674C2.55175 10.1124 2.44472 10.1799 2.35379 10.2662C2.26286 10.3525 2.18981 10.4558 2.13883 10.5703L1.02027 13.0826C0.917298 13.3139 0.910419 13.5766 1.00115 13.8129C1.09188 14.0493 1.27278 14.2399 1.50406 14.3429C1.73534 14.4459 1.99806 14.4527 2.23441 14.362C2.47077 14.2713 2.6614 14.0904 2.76437 13.8591L2.89195 13.5726C3.5543 14.8899 4.56971 15.9973 5.82485 16.7712C7.07999 17.545 8.52548 17.9548 10 17.9549C10.0461 17.9549 10.0925 17.9545 10.1387 17.9537C11.6495 17.9276 13.1215 17.4718 14.3827 16.6397C15.6439 15.8075 16.6421 14.6335 17.2604 13.2548C17.3641 13.0238 17.3718 12.7611 17.2818 12.5245C17.1918 12.2879 17.0115 12.0967 16.7805 11.993Z"
                            fill="white"
                        />
                        <path
                            d="M18.496 5.65712C18.2647 5.55416 18.002 5.54728 17.7656 5.63801C17.5293 5.72874 17.3387 5.90963 17.2357 6.14091L17.1081 6.42743C16.435 5.08855 15.3975 3.96698 14.1149 3.19185C12.8324 2.41671 11.3571 2.01954 9.85873 2.04604C8.3604 2.07255 6.90001 2.52166 5.64571 3.34167C4.39141 4.16168 3.39419 5.31925 2.76885 6.68111C2.71633 6.79502 2.68678 6.91818 2.68188 7.04353C2.67698 7.16887 2.69684 7.29396 2.74032 7.41162C2.7838 7.52929 2.85004 7.63724 2.93526 7.72929C3.02049 7.82134 3.12302 7.89569 3.23699 7.94808C3.35097 8.00048 3.47415 8.0299 3.59951 8.03466C3.72486 8.03942 3.84992 8.01943 3.96754 7.97582C4.08516 7.93222 4.19303 7.86586 4.28499 7.78053C4.37695 7.69521 4.45119 7.5926 4.50346 7.47857C4.97898 6.44286 5.73746 5.5626 6.6915 4.93922C7.64554 4.31584 8.75631 3.97472 9.89579 3.95517C11.0353 3.93563 12.1571 4.23845 13.1319 4.82873C14.1068 5.41902 14.895 6.27275 15.4058 7.29154L14.8652 7.05083C14.6341 6.94943 14.3724 6.94361 14.1371 7.03465C13.9017 7.12569 13.712 7.30619 13.6094 7.53668C13.5068 7.76718 13.4996 8.02892 13.5894 8.26471C13.6792 8.5005 13.8587 8.69114 14.0887 8.79497L16.5937 9.91013L16.5982 9.91216C16.7128 9.96359 16.8364 9.99191 16.9619 9.99549C17.0875 9.99907 17.2125 9.97784 17.3298 9.93301C17.4471 9.88819 17.5544 9.82066 17.6456 9.73428C17.7368 9.64791 17.81 9.54439 17.8611 9.42966L18.9796 6.91743C19.0826 6.68617 19.0895 6.42347 18.9988 6.18712C18.9081 5.95077 18.7273 5.76012 18.496 5.65712Z"
                            fill="white"
                        />
                    </svg>
                    View History
                </button>
            </div>
        </div>
    </div>

    <form action="{{ $action }}" method="post" enctype="multipart/form-data" class="create-item-form">
        @csrf
        @if(isset($nft))
            @method('PATCH')
        @endif

        <input type="hidden" name="author_id" value="{{ $user }}">
        <input type="hidden" name="owner_id" value="{{ $user }}">

        <h4>Upload file</h4>
        <label class="input__file" for="image__input">
            <span class="input__file--upload">Upload NFT</span>
            <input type="file" name="img_path" class="image__input" id="image__input"
                   value="{{ old('img_path', $nft->img_path ?? '') }}"/>
            <span class="input__file--url">{{ old('img_path', $nft->img_path
                                              ?? 'PNG, JPG, GIF, WEBP or MP4. Max 2mb.') }}</span>
{{--            PNG, JPG, GIF, WEBP or MP4. Max 2mb.--}}
        </label>
        @error('img_path')
        <div class="error">{{ $errors->first('img_path') }}</div>
        @enderror

        <h4>Price</h4>
        <input
            type="text"
            name="price"
            value="{{ old('price', $nft->price ?? '') }}"
            placeholder="Enter price for one item (ETH)"
            class="create-item-inputs price"
            maxlength="15"
        />
        @error('price')
        <div class="error">{{ $errors->first('price') }}</div>
        @enderror

        <h4>Title</h4>
        <input
            type="text"
            name="name"
            value="{{ old('name', $nft->name ?? '') }}"
            placeholder="Item Name"
            class="create-item-inputs title"
{{--            maxlength="25"--}}
        />
        @error('name')
        <div class="error">{{ $errors->first('name') }}</div>
        @enderror

        <h4>Description</h4>
        <input
            type="text"
            name="description"
            value="{{ old('description', $nft->description ?? '') }}"
            placeholder="e.g. “This is very limited item”"
            class="create-item-inputs creator"
        />
        @error('description')
        <div class="error">{{ $errors->first('description') }}</div>
        @enderror

        <div class="royalty-collection-container">
            <div class="group">
                <h4>Royalties</h4>
                <input
                    type="text"
                    name="royalty"
                    value="{{ old('royalty', $nft->royalty ?? '') }}"
                    placeholder="5%"
                    class="create-item-inputs"
                />
            </div>
            @error('royalty')
            <div class="error">{{ $errors->first('royalty') }}</div>
            @enderror

            <div class="group">
                <h4>Collection</h4>
                <select name="collection_id" class="create-item-inputs">
                    @foreach($collections as $collection)
                        @if($nft?->collection_id == $collection->id)
                            <option value="{{ $collection->id }}" selected>{{ $collection->name }}</option>
                        @else
                            <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="group">
                <input type="submit" value="Save" class="save-item"/>
            </div>
        </div>
    </form>
</div>
