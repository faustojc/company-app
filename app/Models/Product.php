<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'product_id';

    protected $fillable = ['name', 'description', 'category', 'flaw', 'size', 'color', 'price'];
}
