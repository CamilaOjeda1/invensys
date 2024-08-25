<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\VentaProducto;
use App\Models\Venta;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        $ventas = DB::table('venta')
        ->join('users', 'venta.id_usuario', '=', 'users.id')
        ->select(
            'venta.id_venta',
            'venta.fecha_venta',
            'users.name as usuario_nombre'
        )
        ->get();
        //$ventas_lista = Venta::all();
        return view('venta.index', compact('productos','ventas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('venta.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $venta = new Venta();
            $venta->id_venta = Venta::max('id_venta') + 1; 
            $venta->fecha_venta = Carbon::now(); 
            $venta->id_usuario = auth()->user()->id;
            $venta->total_venta = 3000; 
            $venta->save();

            foreach ($request->input('productos') as $producto) {
                $productoId = $producto['id'];
                $cantidad = isset($producto['cantidad']) ? $producto['cantidad'] : 1;

                // Buscar el producto en la base de datos
                $productoDb = Producto::find($productoId);

                $ventaProducto = new VentaProducto();
                $ventaProducto->id_venta_producto = VentaProducto::max('id_venta_producto') + 1;
                $ventaProducto->id_venta = $venta->id_venta;
                $ventaProducto->id_producto = $producto['id'];
                $ventaProducto->cantidad_venta = $producto['cantidad'];
                $ventaProducto->save();

                $productoDb->cantidad -= $cantidad;
                $productoDb->save();
            }

            DB::commit();

            $productos = Producto::all();
            $ventas = Venta::with('productos.producto')->get();
            $ventas_lista = Venta::all();

            return redirect()->route('venta.crear')
            ->with('success', 'Venta creada exitosamente.')
            ->with('producto', $productos)
            ->with('ventas', $ventas)
            ->with('ventas_lista', $ventas_lista);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('venta.crear')->with('error', 'Hubo un error al crear la venta.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
