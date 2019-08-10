<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return Service::all();
    }

    public function store(Request $request)
    {
        $data = $request->only('name','price');
        $data['barber_id'] = auth()->user()->id;
        $service = Service::create($data);
        return $service;
    }

    public function show(Service $service)
    {
        return $service;
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->only('name','price');
        $service->update($data);
        return $service;
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return ['status' => 'Success', 'operation' => 'delete'];
    }
}
