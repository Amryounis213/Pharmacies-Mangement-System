<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'image' , 'description' ,'usage' ,'size' , 'price' , 'discount' ,'category_id', 'status'];
    protected $guarded = [];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }


    public function Pharmacy()
    {
        return $this->belongsToMany(Pharmacy::class , 'pharmacy_medicine' ,'medicine_id' , 'pharmacy_id');
    }



    public function Offer()
    {
        return $this->belongsToMany(Offer::class , 'medicine_offer' , 'medicine_id' , 'offer_id');
    }

    public function toArray()
    {
        return [
            'id'=> $this->id,
            'name'=>$this->name ,
            'image'=>$this->image ,
            'description'=>$this->description ,
            'usage'=> $this->usage ,
            'size'=> $this->size ,
            'price'=> (float)$this->price ,
            'discount'=>$this->discount,
            'category'=>$this->category_id ? $this->Category->name : null ,
            'brand'=>$this->brand_id ? $this->Brand->name : null ,
        ];
    }
}
