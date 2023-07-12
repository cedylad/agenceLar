<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropretyContactRequest;
use App\Models\Proprety;
use Illuminate\Http\Request;
use App\Http\Requests\SerachPropretiesRequest;
use App\Mail\PropretyContactMail;
use Illuminate\Support\Facades\Mail;

class PropretyController extends Controller
{
    public function index(SerachPropretiesRequest $request)
    {
        $query = Proprety::query()->orderBy('created_at', 'desc');
        if ($price = $request->validated('price')) {
            $query = $query->where('price', '<=', $price);
        };

        if ($surface = $request->validated('surface')) {
            $query = $query->where('surface', '=>', $surface);
        };

        if ($rooms = $request->validated('rooms')) {
            $query = $query->where('rooms', '<=', $rooms);
        };

        if ($title = $request->validated('title')) {
            $query = $query->where('title', 'like', "%{$title}%");
        };

        return view('proprety.index', [
            'propreties' => $query->paginate(16),
            'input' => $request->validated()
        ]);
    }

    public function show(string $slug, Proprety $proprety)
    {
        $expectedSlug = $proprety->getSlug();
        if ($slug !== $expectedSlug) {
            return to_route('proprety.show', ['slug' => $expectedSlug, 'proprety' => $proprety]);
        }

        return view('proprety.show', [
            'proprety' => $proprety
        ]);
    }

    public function contact(Proprety $proprety, PropretyContactRequest $request)
    {
        Mail::send(new PropretyContactMail($proprety, $request->validated()));
        return back()->with('success', 'Votre message a bien été envoyé');
    }
}
