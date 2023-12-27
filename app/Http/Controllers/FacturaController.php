<?php

namespace App\Http\Controllers;

use App\Models\Cheque;
use App\Models\Empresa;
use App\Models\estado;
use App\Models\Factura;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Class FacturaController
 * @package App\Http\Controllers
 */
class FacturaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Aplica el middleware auth a todas las acciones del controlador
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Factura::query();
        $query->orderBy('created_at', 'desc');

        $search = $request->input('search');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('numero_factura', 'LIKE', '%' . $search . '%')
                    ->orWhereHas('empresa', function ($subQuery) use ($search) {
                        $subQuery->where('nombre_empresa', 'LIKE', '%' . $search . '%');
                    });
            });
        }

        $facturas = $query->paginate(5);

        $empresa = Empresa::pluck('nombre_empresa', 'id');

        return view('factura.index', compact('facturas', 'empresa'))
            ->with('i', ($request->input('page', 1) - 1) * $facturas->perPage());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $factura = new Factura();
        $empresa = Empresa::pluck('nombre_empresa', 'id');
        $estados = estado::pluck('estado', 'id');
        return view('factura.create', compact('factura','empresa','estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
            'numero_factura' => 'required',
            'monto' => 'required',
            'foto_fac' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // Agrega las otras reglas de validación según sea necesario
        ]);

        if ($request->hasFile('foto_fac')) {
            $foto = $request->file('foto_fac');
            $rutaFoto = $foto->store('facturas', 'custom_disk');
            $rutaFotos = $foto->store('facturas', 'public');
        }
        // Crear la factura con la ruta de la imagen
        $factura = new Factura();
        $factura->numero_factura = $request->numero_factura;
        $factura->monto = $request->monto;
        $factura->empresas_id = $request->empresas_id;
        $factura->estados_id = $request->estados_id;
        $factura->foto_fac = $rutaFoto ?? null; // Asignación de la ruta de la foto o null si no se cargó ninguna foto
        $factura->foto_fac = $rutaFotos ?? null; // Asignación de la ruta de la foto o null si no se cargó ninguna foto
        $factura->save();
        }catch(QueryException $queryException){

            Log::debug($queryException->getMessage());

            return redirect()->route('facturas.create')->with('alertaQery', 'murio');

        }

        return redirect()->route('facturas.index')
            ->with('Guardado', 'Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $factura = Factura::with('cheque')->find($id);
        $cheque = Cheque::pluck('foto_ch', 'id');

        return view('factura.show', compact('factura','cheque'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $factura = Factura::find($id);
        $cheque = new Cheque();
        $empresa = Empresa::pluck('nombre_empresa', 'id');
        $estados = estado::pluck('estado', 'id');
        return view('factura.edit', compact('factura','empresa','estados','cheque'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Factura $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factura $factura)
    {
        request()->validate([
            'numero_factura' => 'required',
            'monto' => 'required',
            'foto_fac' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // Agrega las otras reglas de validación según sea necesario
        ]);
        $factura->update([
            'numero_factura' => $request->numero_factura,
            'monto' => $request->monto,

        ]);
        if ($request->hasFile('foto_fac')) {
            $foto = $request->file('foto_fac');

            $rutaFoto = $foto->store('facturas', 'custom_disk');
            $rutaFotos = $foto->store('facturas', 'public');

            $factura->update(['foto_fac' => $rutaFoto]);
            $factura->update(['foto_fac' => $rutaFotos]);
        }


        return redirect()->route('facturas.index')
            ->with('success', 'Factura updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $factura = Factura::find($id)->delete();

        return redirect()->route('facturas.index')
            ->with('success', 'Factura deleted successfully');
    }

    public function cancelado(Factura $id)
    {
        $id->update(['estados_id' => 2]);


        return redirect()->route('facturas.index')
        ->with('Cancelado', 'Cancelado');
    }
}
