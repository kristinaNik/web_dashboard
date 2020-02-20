<?php


namespace App\Http\Repositories;


use App\ButtonConfiguration;
use App\Http\Interfaces\ButtonConfigurationInterface;

class ButtonConfigurationRepository implements ButtonConfigurationInterface
{

    /**
     * Store configurations
     *
     * @param $data
     * @return ButtonConfiguration
     */
    public function store($data)
    {
        $buttonConfiguration = new ButtonConfiguration();
        $buttonConfiguration->title = $data->title;
        $buttonConfiguration->link = $data->link;
        $buttonConfiguration->color_id = $data->color;
        $buttonConfiguration->save();

        return $buttonConfiguration;
    }

    /**
     * Update configurations
     *
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data,$id)
    {
        $buttonConfiguration = ButtonConfiguration::findOrFail($id);

        $buttonConfiguration->title = $data->title;
        $buttonConfiguration->link = $data->link;
        $buttonConfiguration->color_id = $data->color;
        $buttonConfiguration->save();

        return $buttonConfiguration;
    }

    /**
     * Delete configurations
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $buttonConfiguration = ButtonConfiguration::findOrFail($id);
        $buttonConfiguration->delete();

        return $buttonConfiguration;
    }
}
