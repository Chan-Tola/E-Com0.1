<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    // Table constants
    const TABLENAME = 'listings';
    const ID = 'id';
    const USER_ID = 'user_id';
    const CATEGORY_ID = 'category_id';
    const TITLE = 'title';
    const DESCRIPTION = 'description'; // ADD THIS
    const PRICE = 'price';
    const CURRENCY = 'currency';
    const CONDITION = 'condition';
    const STATUS = 'status';
    const IMAGES = 'images';
    const CONTACT_PHONE = 'contact_phone';
    const CONTACT_EMAIL = 'contact_email';
    const LOCATION = 'location';
    const VIEW_COUNT = 'view_count';
    const IS_FEATURED = 'is_featured';
    const CREATED_AT = 'created_at'; // FIX TYPO
    const UPDATED_AT = 'updated_at'; // FIX TYPO

    // Status constants - ADD MORE FOR WORKFLOW
    const STATUS_ACTIVE = 'active';
    const STATUS_SOLD = 'sold';

    // Condition constants
    const CONDITION_NEW = 'new';
    const CONDITION_USED = 'used';

    protected $table = self::TABLENAME;

    protected $fillable = [
        self::USER_ID,
        self::CATEGORY_ID,
        self::TITLE,
        self::DESCRIPTION, // ADD THIS
        self::PRICE,
        self::CURRENCY,
        self::CONDITION, // ADD THIS
        self::STATUS,
        self::IMAGES,
        self::CONTACT_PHONE,
        self::CONTACT_EMAIL,
        self::LOCATION,
        self::IS_FEATURED,
    ];

    protected $casts = [
        self::IMAGES => 'array',
        self::IS_FEATURED => 'boolean',
        self::PRICE => 'decimal:2',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, self::USER_ID);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, self::CATEGORY_ID);
    }
}
