<?php

namespace App\Http\Controllers;

use App\Models\Cheque;
use App\Models\Producto;
use App\Models\Marca;
use Carbon\Carbon;

use App\Models\Factura;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware(['auth', 'verified'])->only('index');
        $this->middleware(['auth', 'verified'])->only('calendario');

    }

    /**     
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
     public function index()
     {
         $totalProductos = Producto::count();
         $totalMarcas = Marca::count();

         $montoTotalFactura = Factura::sum('monto');
     
         // Calcular el monto total de todas las facturas con cheques asignados (estado 1)
         $montoTotalFacturasCheques = DB::table('cheques')
             ->join('facturas', 'cheques.facturas_id', '=', 'facturas.id')
             ->where('cheques.estados_id', 1) // Cheques asignados (estado 1)
             ->sum('facturas.monto');
     
         // Restar el monto de las facturas con estado 2 o 3
         $montoRestar = Factura::whereIn('estados_id', [2, 3])->sum('monto');
         $montoTotalFacturas = $montoTotalFacturasCheques - $montoRestar;
         $montoTotalFactura -= $montoRestar;

     
         $totalCheques = Cheque::where('estados_id', 2)->count();
     
         return view('home', compact('totalProductos', 'totalMarcas', 'montoTotalFactura', 'totalCheques', 'montoTotalFacturasCheques'));
        }



    public function calendario()
    {
        $cheques = Cheque::with('facturas.empresa')->get();

        // Pasa los datos a la vista del calendario
        return view('calendario', compact('cheques'));
    }

}



