<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacist extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'mobile' , 'image' ,'status'];

    public function Pharmacy()
    {
        return $this->belongsTo(Pharmacy::class , 'pharmacy_id' , 'id');
    }
    


    public function toArray()
    {
        return[
            'id'=>$this->id ,
            'name'=>$this->name ,
            'mobile'=>$this->mobile ,
            'pharmacy'=> $this->pharmacy_id ? $this->Pharmacy->name : null,
        ];
    }
}
