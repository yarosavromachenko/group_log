<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 * @package App\Models
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 */
class Student extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->belongsToMany(Item::class)->withPivot('grade');
    }

    protected $fillable = [
        'first_name',
        'last_name',
    ];
}
