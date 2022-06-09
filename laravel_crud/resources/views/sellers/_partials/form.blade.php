
<form action="{{ isset($seller) ? route('sellers.update',['seller' => $seller->id]) : route('sellers.store') }}" method="post">
    @csrf
    @if(isset($seller))
        @method('PATCH')
    @endif
    <label>first name:
        <input type="text" name="first_name" value="{{ old('first_name', $seller->first_name ?? '') }}">
    </label>
    @error('first_name')
    <div class="error">{{ $errors->first('first_name') }}</div>
    @enderror
    <br>

    <label>last name:
        <input type="text" name="last_name" value="{{ old('last_name', $seller->last_name ?? '') }}">
    </label>
    @error('last_name')
    <div class="error">{{ $errors->first('last_name') }}</div>
    @enderror
    <br>

    <label>dni:
        <input type="text" name="dni" value="{{ old('dni', $seller->dni ?? '') }}">
    </label>
    @error('dni')
    <div class="error">{{ $errors->first('dni') }}</div>
    @enderror
    <br>

    <label>phone:
        <input type="text" name="phone" value="{{ old('phone', $seller->phone ?? '') }}">
    </label>
    @error('phone')
    <div class="error">{{ $errors->first('phone') }}</div>
    @enderror
    <br>

    <label>hired:
        <input type="date" name="hired_at" value="{{ old('hired_at',
        isset($seller) ? $seller->hired_at->format('Y-m-d') : '') }}">
    </label>
    @error('hired_at')
    <div class="error">{{ $errors->first('hired_at') }}</div>
    @enderror
    <br>

    <label>carnet:
        <input type="text" name="carnet" value="{{ old('carnet', $seller->carnet ?? '') }}">
    </label>
    @error('carnet')
    <div class="error">{{ $errors->first('carnet') }}</div>
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

    <label>Branch:
        <select name="branch_id">
            @foreach($branches as $branch)
                <option value="{{ $branch->id  }}">{{ $branch->name }}</option>
            @endforeach
        </select>
    </label>
    @error('branch_id')
    <div class="error">{{ $errors->first('branch_id') }}</div>
    @enderror
    <br>

    <button class="submit" type="submit">Save</button>
</form>

