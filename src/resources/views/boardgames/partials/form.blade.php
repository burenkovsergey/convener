<div class="form-group">
    <lavel for="name">Название</lavel>
    <input id="name" type="text" name="name" class="form-control" value="{{ old('name', optional($boardgame ?? null)->name) }}"/>
</div>
@error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group mt-3">
    <label for="description">Описание</label>
    <textarea id="description" class="form-control" name="description">{{ old('description', optional($boardgame ?? null)->description) }}</textarea>
</div>

<div class="input-group mt-3 mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text">Количество игроков</span>
    </div>
    <input id="min_players_count" name="min_players_count" type="number" aria-label="От" class="form-control" value="{{ old('min_players_count', optional($boardgame ?? null)->min_players_count) }}">
    <input id="max_players_count" name="max_players_count" type="number" aria-label="До" class="form-control" value="{{ old('max_players_count', optional($boardgame ?? null)->max_players_count) }}">
</div>

<div class="form-group">
    <label for="cover">Cover</label>
    <input type="file" id="cover" name="cover" class="form-control-file" value="{{ old('cover') }}"/>
</div>

@if ($errors->any())
    <div class="mb-3">
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
