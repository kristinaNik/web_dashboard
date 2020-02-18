<?php


namespace App\Http\Interfaces;


interface ButtonConfigurationInterface
{
    public function store($data);

    public function update($data, $id);

    public function destroy($id);

}
