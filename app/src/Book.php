<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

final class Book extends Model
{
    public function author()
    {
        return $this->belongsTo('App\Author');
    }
}
