<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @property string      $name
 * @property string|null $description
 * @property string|null $cover_path
 * @property int         $min_players_count
 * @property int         $max_players_count
 */
class BoardGame extends Model {
    private const DEFAULT_COVER = '';

    protected $fillable = [
        'name',
        'description',
        'min_players_count',
        'max_players_count',
        'cover_path',
    ];

    public function getCoverUrl(): string {
        return Storage::url($this->cover_path) ?? Storage::url(static::DEFAULT_COVER);
    }

    use HasFactory;
}
