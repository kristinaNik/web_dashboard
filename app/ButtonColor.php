<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class ButtonColor extends Model
{
    protected $table = 'button_colors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'color'
    ];
}
