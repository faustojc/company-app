<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

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
}
