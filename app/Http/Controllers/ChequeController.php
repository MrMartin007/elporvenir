<?php

namespace App\Http\Controllers;

use App\Models\Cheque;
use App\Models\Empresa;
use App\Models\estado;
use App\Models\Factura;
use Illuminate\Http\Request;

/**
 * Class ChequeController
 * @package App\Http\Controllers
 */
class ChequeController extends Controller
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
    public function index()
    {
        $query = Cheque::query();
        $query->orderBy('created_at', 'desc');
        $cheques = $query->paginate(5);
        $estados = Estado::pluck('estado','id');
        $facturas = Factura::pluck('monto','id');

        return view('cheque.index', compact('cheques','facturas','estados'))
            ->with('i', (request()->input('page', 1) - 1) * $cheques->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // Recupera la factura por su ID
        $factura = Factura::find($id);


        // Crea una nueva instancia de Cheque
        $cheque = new Cheque();
        $cheque->facturas_id = $factura->id;

        // Obtén las opciones de las empresas y estados
        $empresa = Empresa::pluck('nombre_empresa', 'id');
        $estados = Estado::pluck('estado', 'id');

        // Pasa los datos a la vista
        return view('cheque.create', compact('cheque', 'factura', 'empresa', 'estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    // ChequeController.php

    public function store(Request $request)
    {
        request()->validate([
            'no_cheque' => 'required',
            'fecha_cobro' => 'required',
            'facturas_id' => 'required',
            'estados_id' => 'required',

            'foto_ch' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // Agrega las otras reglas de validación según sea necesario
        ]);

        if ($request->hasFile('foto_ch')) {
            $foto = $request->file('foto_ch');
            $rutaFoto = $foto->store('cheques', 'custom_disk');
            $rutaFotos = $foto->store('cheques', 'public');
        }
        $cheque = new Cheque();
        $cheque->no_cheque = $request->no_cheque;
        $cheque->fecha_cobro = $request->fecha_cobro;
        $cheque->facturas_id = $request->facturas_id;
        $cheque->estados_id = $request->estados_id;
        $cheque->foto_ch = $rutaFoto ?? null; // Asignación de la ruta de la foto o null si no se cargó ninguna foto
        $cheque->foto_ch = $rutaFotos ?? null; // Asignación de la ruta de la foto o null si no se cargó ninguna foto
        $cheque->save();


        // Actualiza el estado de la factura
        $factura = Factura::find($request->factura_id);
        $factura->update(['estados_id' => 3]); // Actualiza el ID del estado según tu lógica

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
        $cheque = Cheque::find($id);

        return view('cheque.show', compact('cheque'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cheque = Cheque::find($id);
        $factura = Factura::find($id);
        return view('cheque.edit', compact('cheque','factura'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cheque $cheque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factura $factura)
    {
        request()->validate(Factura::$rules);

        $factura->update($request->all());

        return redirect()->route('cheques.index')
            ->with('success', 'Cheque updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cheque = Cheque::find($id)->delete();

        return redirect()->route('cheques.index')
            ->with('success', 'Cheque deleted successfully');
    }
    public function cancelado(Cheque $id)
    {
        $id->update(['estados_id' => 2]);

        return redirect()->route('cheques.index')
        ->with('Cancelado', 'Cancelado');
    }
}
