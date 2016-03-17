<?php

namespace App;

use \Conner\Likeable\LikeableTrait;
use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
  use LikeableTrait;

  /**
   * Get the user for this pin
   */
  public function user () {
    return $this->belongsTo('App\User');
  }
}
