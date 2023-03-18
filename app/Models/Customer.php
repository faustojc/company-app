<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Customer extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customer';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'customer_id';

    public static function where(string $column, string $data): \Illuminate\Database\Eloquent\Builder
    {
        return Customer::query()->where($column, null, $data)->first();
    }
}
