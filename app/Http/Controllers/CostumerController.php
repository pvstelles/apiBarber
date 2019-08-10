<?php

namespace App\Http\Controllers;

use App\Costumer;
use Illuminate\Http\Request;

class CostumerController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        return Costumer::where('barber_id',auth()->user()->id)->get();
    }

    public function store(Request $request)
    {
        $data = $request->only('name','phone');
        $data['barber_id'] = auth()->user()->id;
        $costumer = Costumer::create($data);
        return $costumer;
    }

    public function show(Costumer $costumer)
    {
        return $costumer->toJson();
    }

    public function update(Request $request, Costumer $costumer)
    {
        $data = $request->only('name','phone');
        $data['barber_id'] = auth()->user()->id;
        $costumer->update($data);
        $costumer->save();
        return $costumer;
    }

    public function destroy(Costumer $costumer)
    {
        $costumer->delete();

        return ['status' => 'Success', 'operation' => 'delete'];
    }


}
