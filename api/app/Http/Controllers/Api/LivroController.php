<?php

namespace App\Http\Controllers\Api;

use App\Models\livro;
use Illuminate\Http\Request;
use App\Http\Requests\LivroRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\LivroResource;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return LivroResource::collection(Livro::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LivroRequest $request)
    {
        $livro = Livro::create($request->all());

        return new LivroResource($livro);
    }

    /**
     * Display the specified resource.
     */
    public function show(livro $livro)
    {
        return new LivroResource($livro);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LivroRequest $request, livro $livro)
    {
        $livro->update($request->validated());

        return new LivroResource($livro);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(livro $livro)
    {
        $livro->delete();

        return response()->noContent();
    }
}
