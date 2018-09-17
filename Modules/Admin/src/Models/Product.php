<?php

declare(strict_types=1);

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Product extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /**
     * The primary key used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                    'product_title',
                    'slug',
                    'price',
                    'url',
                    'meta_key',
                    'meta_description',
                    'product_category',
                    'product_sub_category',
                    'qty',
                    'discount',
                    'description',
                    'photo',
                    'product_type',
                    'validity',
                    'total_stocks',
                    'available_stocks',
                    'rating',
                    'status'

                    ];  // All field of user table here


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


    public function category()
    {
        return $this->belongsTo('Modules\Admin\Models\Category', 'product_category');
    }
}
