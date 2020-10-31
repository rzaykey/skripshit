<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transaction";
    protected $fillable = ['subtotal','payments','sent_by','resi','created_at','updated_at','from','to','shipping','id_customer','status','data'];
}
