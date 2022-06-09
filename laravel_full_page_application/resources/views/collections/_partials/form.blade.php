@php
    $action = isset($collection)
    ? route('collections.update',['collection' => $collection->id])
    : route('collections.store');
@endphp

@auth
<div class="collection-form-container">
    <form action="{{ $action }}" method="post" class="collection-form">
        @csrf
        @if(isset($collection))
            @method('PATCH')
        @endif

        <input type="hidden" name="author_id" value="{{ old('author_id', $user ?? '') }}">

        <span class="collection">Title</span>
        <input
            type="text"
            name="name"
            value="{{ old('name', $collection->name ?? '') }}"
            placeholder="Collection name"

        />
        @error('name')
        <div class="error">{{ $errors->first('name') }}</div>
        @enderror

        <span class="collection">Description</span>
        <input
            type="text"
            name="description"
            value="{{ old('description', $collection->description ?? '') }}"
            placeholder="e.g This is a wonderful collection"
        />
        @error('description')
        <div class="error">{{ $errors->first('description') }}</div>
        @enderror

        <input type="submit" value="create" />

    </form>
</div>
@endauth
