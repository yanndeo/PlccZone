<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
   //public $table = 'devis';

   public $fillable = ['produit','qte','fullname','societe','phone','email' , 'message'];
   
}
