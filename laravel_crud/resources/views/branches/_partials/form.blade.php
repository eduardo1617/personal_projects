@php
    $action = isset($branch)
    ? route('branches.update',['branch' => $branch->id])
    : route('branches.store');
@endphp

<form action="{{ $action }}" method="post">
    @csrf
    @if($branch)
        @method('PATCH')
    @endif
    <label>Name:
        <input type="text" name="name" value="{{ old('name', $branch->name ?? '') }}">
    </label>
    @error('name')
    <div class="error">{{ $errors->first('name') }}</div>
    @enderror
    <br>

    <label>City:
        <input type="text" name="city" value="{{ old('city', $branch->city ?? '') }}">
    </label>
    @error('city')
    <div class="error">{{ $errors->first('city') }}</div>
    @enderror
    <br>

    <label>State:
        <input type="text" name="state" value="{{ old('state', $branch->state ?? '') }}">
    </label>
    @error('state')
    <div class="error">{{ $errors->first('state') }}</div>
    @enderror
    <br>

    <label>Address:
        <input type="text" name="address" value="{{ old('address', $branch->address ?? '') }}">
    </label>
    @error('address')
    <div class="error">{{ $errors->first('address') }}</div>
    @enderror
    <br>

    <label>Phone:
        <input type="text" name="phone" value="{{ old('phone', $branch->phone ?? '') }}">
    </label>
    @error('phone')
    <div class="error">{{ $errors->first('phone') }}</div>
    @enderror
    <br>

    <label>Status
        <select name="status">
            @foreach(['active' => 'Active', 'inactive' => 'Inactive'] as $status => $label)
            <option
                @selected(old('status', $branch?->status) == $status)
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

