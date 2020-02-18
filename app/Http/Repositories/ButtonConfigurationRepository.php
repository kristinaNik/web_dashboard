<?php


namespace App\Http\Repositories;


use App\ButtonConfiguration;
use App\Http\Interfaces\ButtonConfigurationInterface;

class ButtonConfigurationRepository implements ButtonConfigurationInterface
{

    public function store($data)
    {
        $buttonConfiguration = new ButtonConfiguration();
        $buttonConfiguration->title = $data->title;
        $buttonConfiguration->link = $data->link;
        $buttonConfiguration->color_id = $data->color;
        $buttonConfiguration->button_id = $data->button_id;
        $buttonConfiguration->save();

        return $buttonConfiguration;
    }
}
