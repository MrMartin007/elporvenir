<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Marca;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Obtener el número total de productos
        $totalProductos = Producto::count();

        // Obtener el número total de marcas
        $totalMarcas = Marca::count();

        return view('home', compact('totalProductos', 'totalMarcas'));
    }
}
