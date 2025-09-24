<?php

namespace App\Constants;

use Illuminate\Support\Facades\Broadcast;

class PermissionConstant
{
    // Admin Permissions
    public const MANAGE_ALL_PRODUCTS =  'manage all products';
    public const MANAGE_ALL_CATEGORIES =    'manage all categories';
    public const MANAGE_ALL_ORDERS =   'manage all orders';
    public const MANAGE_USERS =   'manage users';
    public const MANAGE_SYSTEM_SETTINGS =   'manage system settings';

    // Seller Permissions
    public const CREATE_PRODUCTS = 'create products';
    public const EDIT_OWN_PRODUCTS =   'edit own products';
    public const DELETE_OWN_PRODUCTS = 'delete own products';
    public const MANAGE_OWN_SHOP = 'manage own shop';
    public const VIEW_OWN_SALES = 'view own sale';

    // Buyer Permissions
    public const BROWSE_PRODUCTS = 'browse products';
    public const VIEW_PRODUCT_DETAILS = 'view product details';
    public const ADD_TO_CART = 'add to cart';
    public const PLACE_ORDERS = 'place orders';
    public const MANGE_OWN_ORDER = 'manage own orders';
}
