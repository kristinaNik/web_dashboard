<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class ButtonConfiguration extends Model
{
    protected $table = 'button_configurations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'link', 'color_id', 'button_id'
    ];
}
