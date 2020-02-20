<?php


namespace App\Http\Repositories;
use App\ButtonColor;

class ButtonColorRepository
{

    /**
     * Get color details by return an obj
     *
     * @param $buttonConfigurations
     * @return \stdClass
     */
    public function getColorDetails($buttonConfigurations)
    {
        $obj = new \stdClass();
        $colors = ButtonColor::all();

        $obj->colorId = $buttonConfigurations->colors->id;
        $obj->colorName = $buttonConfigurations->colors->color;
        $obj->allColors = $colors->where('color', '!=',  $obj->colorName)->pluck('color', 'id');

        return $obj;
    }

}
