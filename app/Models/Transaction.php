<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // 'name',
        'user_id',
        'transaction_amount',
        'transaction_type',
    ];
    protected $casts = [
        'created_at' => 'datetime:d/m/Y h:i A', // Change your format
        'updated_at' => 'datetime:d/m/Y h:i A',
    ];
    /**
 * Prepare a date for array / JSON serialization.
 *
 * @param  \DateTimeInterface  $date
 * @return string
 */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d/m/Y h:i A');
    }
}
