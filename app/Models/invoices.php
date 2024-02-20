<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoices extends Model
{
    use HasFactory;
       
    protected $fillable = [
        'invoice_number',
        'invoice_Date',
        'Due_date',
        'serial_id',
        'section_id',
        'Amount_collection',
        'Amount_Commission',
        'Discount',
        'Value_VAT',
        'Rate_VAT',
        'Total',
        'Status',
        'Value_Status',
        'note',
        'Payment_Date',
    ];

    public function section(){
        return $this->belongsTo(sections::class, 'section_id', 'id');
    }
    public function client(){
        return $this->belongsTo(client::class, 'serial_id', 'id');
    }
}
