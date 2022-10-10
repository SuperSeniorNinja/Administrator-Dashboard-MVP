<?php

namespace App\Http\Controllers;

use App\Car;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use DB;

class CarController extends Controller
{
    /**
     * Return a list of all cars.
     *
     * @return array
     */
    public function index(): array
    {
        $cars = Car::with([
            'owners'=>function ($q){
                $q->select([DB::raw("CONCAT(owners.first_name,' ',owners.last_name)  AS fullname"), 'id']);
            }, 
            'addresses'
        ])->orderBy('id', 'ASC')->get()->toArray();
        return $cars;
    }

    /**
     * Return a single car.
     *
     * @param Car $car
     * @return Car
     */
    public function show(Car $car): Car
    {
        $car->owner = $car->owners->first_name." ".$car->owners->last_name;
        $car->full_address = $car->addresses->address . '<br>' . $car->addresses->city . '<br>' . $car->addresses->country . '<br>' . $car->addresses->postal_code;
        return $car;
    }

    /**
     * Store an car.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $car = Car::create($request->all());

        return response()->json($car, 201);
    }

    /**
     * Update an car.
     *
     * @param Request $request
     * @param Car $car
     * @return JsonResponse
     */
    public function update(Request $request, Car $car): JsonResponse
    {
        $car->update($request->all());

        return response()->json($car, 200);
    }

    /**
     * Delete an car.
     *
     * @param Car $car
     * @return JsonResponse
     * @throws Exception
     */
    public function delete(Car $car): JsonResponse
    {
        $car->delete();

        return response()->json(null, 204);
    }
}
