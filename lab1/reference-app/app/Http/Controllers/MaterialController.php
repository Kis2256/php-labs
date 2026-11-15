<?php

namespace App\Http\Controllers;

use App\Models\Material;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::withCount('printers')
            ->orderBy('technology')
            ->orderBy('name')
            ->get();

        return view('materials.index', compact('materials'));
    }
}