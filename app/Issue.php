<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Issue
 *
 * @property int $id
 * @property int $alley
 * @property int $room
 * @property string $description
 * @property bool $is_open
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Issue whereAlley($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Issue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Issue whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Issue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Issue whereRoom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Issue whereUpdatedAt($value)
 * @method static \Illuminate\Contracts\Pagination\LengthAwarePaginator paginate(int $perPage, array $columns, string $pageName, int|null $page)
 * @method static \Illuminate\Database\Eloquent\Builder fill(array $attributes)
 */
class Issue extends Model
{
    protected $fillable = ['alley','room','description'];

    public function genius() {
        return $this->belongsTo('App\User');
    }

    public function appointTo(User $user){
        $this->genius()->associate($user);
        $this->save();
        return $this;
    }
}
