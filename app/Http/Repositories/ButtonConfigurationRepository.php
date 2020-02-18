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
        $buttonConfiguration->save();

        return $buttonConfiguration;
    }

    public function update($data,$id)
    {
        $buttonConfiguration = ButtonConfiguration::findOrFail($id);

        $buttonConfiguration->title = $data->title;
        $buttonConfiguration->link = $data->link;
        $buttonConfiguration->color_id = $data->color;
        $buttonConfiguration->save();

        return $buttonConfiguration;
    }
}
