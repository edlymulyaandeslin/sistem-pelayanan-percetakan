<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    public const PENDING = "pending";
    public const PROCESSING = "processing";
    public const COMPLETED = "completed";

    protected $guarded = [];

    public static function generateOrderNumber()
    {
        return "ORD-" . uniqid();
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}