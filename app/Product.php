<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


  protected $fillable = [
      'name', 'image', 'active', 'cost', 'profit_margin', 'category_id', 'user_id', 'created_at', 'updated_at',
  ];

  public function getPrice() {
    return $this->cost + ($this->cost * $this->profit_margin / 100);
  }

}
