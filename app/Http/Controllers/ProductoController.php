<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\Request;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::paginate();
        $marcas = Marca::pluck('nombre_marca', 'id');

        return view('producto.index', compact('productos','marcas'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        $marcas = Marca::pluck('nombre_marca', 'id');
        return view('producto.create', compact('producto','marcas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo_producto' => 'required',
            'detalle_producto' => 'required',
            'precio_costo' => 'required',
            'precio_venta' => 'required',
            'precio_docena' => 'required',
            'foto_producto' => 'required|image',
            'marcas_id' => 'required',
        ]);

        // Carga de la foto y asignación de la ruta a la entidad "Marca"
        if ($request->hasFile('foto_producto')) {
            $foto = $request->file('foto_producto');
            $rutaFoto = $foto->store('productos', 'public_html');
        }

        // Creación de la entidad "Marca" con los datos ingresados
        $producto = new Producto();
        $producto->codigo_producto = $request->codigo_producto;
        $producto->detalle_producto = $request->detalle_producto;
        $producto->precio_costo = $request->precio_costo;
        $producto->precio_venta = $request->precio_venta;
        $producto->precio_docena = $request->precio_docena;
        $producto->marcas_id = $request->marcas_id;
        $producto->foto_producto = $rutaFoto ?? null; // Asignación de la ruta de la foto o null si no se cargó ninguna foto
        $producto->save();

        return redirect()->route('productos.index')
            ->with('success', 'Producto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        $marcas = Marca::pluck('nombre_marca', 'id'); // Obtener todas las marcas disponibles
        return view('producto.edit', compact('producto','marcas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'codigo_producto' => 'required',
            'detalle_producto' => 'required',
            'precio_costo' => 'required',
            'precio_venta' => 'required',
            'precio_docena' => 'required',
            'foto_producto' => 'image',
            'marcas_id' => 'required',
        ]);

        // Actualizar los campos del producto
        $producto->update([
            'codigo_producto' => $request->codigo_producto,
            'detalle_producto' => $request->detalle_producto,
            'precio_costo' => $request->precio_costo,
            'precio_venta' => $request->precio_venta,
            'precio_docena' => $request->precio_docena,
            'marcas_id' => $request->marcas_id,
        ]);

        // Actualizar la foto solo si se proporciona una nueva imagen
        if ($request->hasFile('foto_producto')) {
            $foto = $request->file('foto_producto');
            $rutaFoto = $foto->store('productos', 'public');
            $producto->update(['foto_producto' => $rutaFoto]);
        }

        return redirect()->route('productos.index')->with('success', 'Producto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $producto = Producto::find($id)->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto deleted successfully');
    }
    public function buscar()
    {
        return view('producto.buscar');
    }
    public function resultados(Request $request)
    {
        // Recuperar el valor de búsqueda desde la solicitud
        $search = $request->input('search');

        // Realizar la lógica de búsqueda según tus necesidades
        $productos = Producto::where('codigo_producto', 'LIKE', "%$search%")
            ->orWhere('detalle_producto', 'LIKE', "%$search%")
            ->get();

        // Pasar los resultados de la búsqueda a la vista resultados.blade.php
        return view('producto.buscar', compact('productos'));
    }
}
