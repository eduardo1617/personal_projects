@php
    $action = isset($category)
    ? route('categories.update',['category' => $category->id])
    : route('categories.store');
@endphp

<form action="{{ $action }}" method="post">
    @csrf
    @if($category)
        @method('PATCH')
    @endif

    <label>Name:
        <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}">
    </label>
    @error('name')
    <div class="error">{{ $errors->first('name') }}</div>
    @enderror
    <br>

    <label>slug:
        <input type="text" name="slug" value="{{ old('slug', $category->slug ?? '') }}">
    </label>
    @error('slug')
    <div class="error">{{ $errors->first('slug') }}</div>
    @enderror
    <br>

    <label>Status
        <select name="status">
            @foreach(['active' => 'Active', 'inactive' => 'Inactive'] as $status => $label)
            <option
                @selected(old('status', $category?->status) == $status)
                value="{{ $status  }}"
            >{{$label}}
            </option>
            @endforeach
        </select>
    </label>
    @error('status')
    <div class="error">{{ $errors->first('status') }}</div>
    @enderror
    <br>

    <button class="submit" type="submit">Save</button>
</form>

