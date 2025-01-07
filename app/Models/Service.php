<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $address_id
 * @property string|null $internet
 * @property string|null $tv
 * @property string|null $ip
 */
class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'address_id',
        'internet',
        'tv',
        'ip',
    ];

    public $timestamps = false;

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }
}
