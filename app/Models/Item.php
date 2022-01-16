<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Item
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 */
class Item extends Model
{
    use HasFactory;

    public function students()
    {
        return $this->belongsToMany(Student::class)->withPivot('grade');;
    }

    protected $fillable = [
        'name',
    ];
}
