<?php

namespace App\Repositories;

use App\Models\Entities\Car;

class CarRepository
{
    private $car;    

    public function __construct(Car $car)
    {
        $this->car = $car;
    }

    public function getAll()
    {
        return $this->car->all();
    }

    public function getByID($id){
        return $this->car->find($id);
    }

    public function addOne($input){
        $data = new $this->car;
        $data->name = $input['name'];
        $data->save();
    }
}
