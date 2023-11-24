<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\VagaResource;
use App\Http\Requests\VagaRequest;

class VagaController extends Controller
{

    public function index()
    {
        return VagaResource::collection(Vaga::all());
    }

    public function store(Request $request)
    {
        $vaga = Vaga::create($request->all());
        return new VagaResource($vaga);
    }

    public function show(string $id)
    {
        return new VagaResource(Vaga::findOrFail($id));
    }

    public function update(Request $request, string $id)
    {
        $vaga = Vaga::findOrFail($id);
        $vaga->update($request->all());
        return new VagaResource($vaga);
    }

    public function destroy(string $id)
    {
        $vaga = Vaga::findOrFail($id);
        $vaga->delete();
        return response()->json(null, 204);
    }
}
