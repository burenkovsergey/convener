<div class="card mt-3 mx-1 border border-secondary" style="width: 18rem;">

    <img class="card-img-top mt-2" src="{{ $boardgame->getCoverUrl() }}" alt="{{ $boardgame->name }}">

    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('boardgames.show', ['boardgame' => $boardgame->id]) }}">{{ $boardgame->name }}</a>
        </h5>
        <? $description      = trim($boardgame->description); ?>
        <? $shortDescription = strlen($description) < 256 ? $description : substr($description, 0, 256) . '...'; ?>
        <p class="card-text">{{ $shortDescription }}</p>
    </div>
    <div class="card-footer">
        <form method="POST" class="d-inline" action="{{ route('boardgames.destroy', ['boardgame' => $boardgame->id ]) }}">
            @csrf
            @method('DELETE')
            <div class="container">
                <div class="row">
                    <a class="btn btn-primary col-sm " href="{{ route('boardgames.edit', ['boardgame' => $boardgame->id]) }}">Изменить</a>
                    <input type="submit" value="Удалить" class="btn btn-danger col-sm">
                </div>
            </div>
        </form>
    </div>
</div>
