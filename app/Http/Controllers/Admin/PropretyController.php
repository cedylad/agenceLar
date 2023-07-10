<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropretyFormRequest;
use App\Models\Proprety;
use Illuminate\Http\Request;
use PhpParser\Builder\Property;

class PropretyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.properties.index', [
            'propreties' => Proprety::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proprety = new Proprety();
        $proprety->fill([
            'surface' => 40,
            'rooms' => 3,
            'bedrooms' => 1,
            'floor' => 0,
            'city' => 'Montpellier',
            'postal_code' => 34000,
            'sold' => false,
        ]);

        return view('admin.properties.form', [
            'proprety' => $proprety

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropretyFormRequest $request)
    {
        $proprety = Proprety::create($request->validated());
        return to_route('admin.proprety.index')->with('success', 'Le bien a été créer');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proprety $proprety)
    {
        return view('admin.properties.form', [
            'proprety' => $proprety
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropretyFormRequest $request, Proprety $proprety)
    {
        $proprety->update($request->validated());
        return to_route('admin.proprety.index')->with('success', 'Le bien a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proprety $proprety)
    {
        $proprety->delete();
        return to_route('admin.proprety.index')->with('success', 'Le bien a bien été supprimé');
    }
}
