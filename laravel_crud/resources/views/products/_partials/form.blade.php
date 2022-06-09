@php
    $action = isset($product)
    ? route('products.update',['product' => $product->id])
    : route('products.store');
@endphp

<form action="{{ $action }}" method="post">
    @csrf
    @if(isset($product))
        @method('PATCH')
    @endif

    <label>Product:
        <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}">
    </label>
    @error('name')
    <div class="error">{{ $errors->first('name') }}</div>
    @enderror
    <br>

    <label>Price:
        <input type="text" name="price" value="{{ old('price', $product->price ?? '') }}">
    </label>
    @error('price')
    <div class="error">{{ $errors->first('price') }}</div>
    @enderror
    <br>

    <label>Category:
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id  }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </label>
    @error('category_id')
    <div class="error">{{ $errors->first('category_id') }}</div>
    @enderror
    <br>

    <label>Status
        <select name="status">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </label>
    @error('status')
    <div class="error">{{ $errors->first('status') }}</div>
    @enderror
    <br>


    <button class="submit" type="submit">Save</button>
</form>

