<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'travel_packages_id', 'user_id', 'additional_visa', 'transaction_total', 'transaction_status'
    ];

    protected $hidden = [

    ];

    
    // Relasi ke transaction_detail, untuk melihat detail transaksi
    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'transactions_id', 'id');
    }


    // Relasi ke travel_packages, untuk melihat travel yg dipilih
    public function travel_package()
    {
        return $this->belongsTo(TravelPackage::class, 'travel_packages_id', 'id');
    }

    // Relasi ke user, untuk mengetahui siapa yg mendaftar di travel packages tersebut
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
