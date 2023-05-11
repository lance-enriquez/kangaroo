<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Kangaroo class.
 *
 * @package App\Models
 * @author Lorenzo Enriquez
 * @since 2023.05.09
 */
class Kangaroo extends Model
{
    use HasFactory;

    /**
     * Table name.
     *
     * @var string
     */
    public $table = 't_kangaroos';

    /**
     * Primary key.
     *
     * @var string
     */
    public $primaryKey = 'kangaroo_id';

    /**
     * Custom unique pivot column.
     *
     * @var string
     */
    public const UNIQUE_PIVOT_KEY = 'name';

    /**
     * Sets timestamp usage.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'nickname',
        'weight',
        'height',
        'gender',
        'color',
        'is_friendly',
        'birth_date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birth_date' => 'date:Y-m-d',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];
}
