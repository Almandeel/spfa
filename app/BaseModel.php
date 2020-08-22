<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
    use SoftDeletes;

    
    //
        // $tables = [
        // 'bill',
        // 'customer',
        // 'branch',
        // 'reservation',
        // 'driver',
        // 'zone',
        // 'vendor',
        // 'unit',
        // 'employee',
        // 'categorie',
        // 'restaurant',
        // 'store',
        // 'item',
        // 'user',
        // 'hole',
        // 'kitchen',
        // 'car',
        // 'component',
        // 'store_items_entry',
        // 'kitchen_items_leave',
        // 'kitchen_item',
        // 'store_item',
        // 'group',
        // 'store_items_leave',
        // 'kitchen_items_entry',
        // 'table',
        // 'order',
        // 'deliverie',
        // 'order_item',
        // 'orders_historie',
        // 'users'
        // ];
}
