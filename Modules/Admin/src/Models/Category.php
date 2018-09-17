<?php

declare(strict_types=1);

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

use Nestable\NestableTrait;

class Category extends Eloquent
{
    use NestableTrait;

    protected $parent = 'parent_id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $casts = [
        'created_at' => 'datetime:m-d-Y',
    ];

    protected $table = 'categories';
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
    protected $fillable = ['category_group_name','category','description','category_name','name','url'];  // All field of user table here


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function subcategory()
    {
        return $this->belongsTo('Modules\Admin\Models\Category', 'id', 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo('Modules\Admin\Models\Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('Modules\Admin\Models\Category', 'parent_id', 'id');
    }

    public function groupCategory()
    {
        return $this->hasMany('Modules\Admin\Models\Category', 'parent_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('Modules\Admin\Models\Category', 'parent_id');
    }

    public function product()
    {
        return $this->hasMany('Modules\Admin\Models\Product', 'product_category');
    }
}
