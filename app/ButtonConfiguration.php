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
        'title', 'link', 'color_id'
    ];

    public function colors()
    {
        return $this->hasOne('App\ButtonColor', 'id', 'color_id');
    }
}
