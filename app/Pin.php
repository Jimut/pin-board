<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
  /**
   * Get the user for this pin
   */
  public function user () {
    return $this->belongsTo('App\User');
  }
}
