<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CarRepository;
use App\Models\Entities\Car;

class CarController extends Controller
{
  // 依賴注入
  private $carRepository;

  public function __construct(CarRepository $carRepository)
  {
    $this->carRepository = $carRepository;
  }

  public function index()
  {
    // $data = Car::all();
    // dd($data->toArray());

    $data = $this->carRepository->getAll();
    dd($data);
  }

  public function create()
  {
    //
  }

  public function store(Request $request)
  {
    //
  }

  public function show($id)
  {
    //
  }

  public function edit($id)
  {
    $id = 5;
    $data = $this->carRepository->getByID($id);
    dd($data);
  }

  public function update(Request $request, $id)
  {
    //
  }

  public function destroy($id)
  {
    //
  }
}