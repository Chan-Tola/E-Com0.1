<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Table constants - MUST MATCH MIGRATION
    const TABLENAME = 'categories';
    const ID = 'id';
    const PARENT_ID = 'parent_id';
    const NAME = 'name';
    const NAME_KH = 'name_kh';
    const SLUG = 'slug';
    const IS_ACTIVE = 'is_active';
    const SORT_ORDER = 'sort_order';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = self::TABLENAME;

    protected $fillable = [
        self::NAME,
        self::NAME_KH,
        self::SLUG,
        self::PARENT_ID,
        self::IS_ACTIVE,
        self::SORT_ORDER,
    ];

    // Relationships
    public function parent()
    {
        return $this->belongsTo(Category::class, self::PARENT_ID);
    }

    public function children()
    {
        return $this->hasMany(Category::class, self::PARENT_ID);
    }

    public function listings()
    {
        return $this->hasMany(Listing::class, Listing::CATEGORY_ID);
    }
}
