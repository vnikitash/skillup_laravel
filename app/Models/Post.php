<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Post
 * @package App\Models
 *
 * @property int $id;
 * @property string $title;
 * @property string $description;
 * @property int $user_id;
 * @property Carbon $created_at;
 * @property Carbon $update_at;
 * @property-read \App\Models\User $user
 */
class Post extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}