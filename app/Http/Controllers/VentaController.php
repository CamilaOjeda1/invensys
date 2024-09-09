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
     * Obtiene todos los productos disponibles
     * Luego obtiene una lista de ventas junto con el nombre del usuario que realizó cada venta
     * Retorna la vista venta.index con los productos y ventas obtenidos
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
     * Función que guarda la venta y los productos asociados a ella. 
     * Además actualiza el stock del producto insertado. 25082024
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $venta = new Venta();
            $venta->id_venta = Venta::max('id_venta') + 1; //Asigna el siguiente ID de venta
            $venta->fecha_venta = Carbon::now(); //Establece la fecha actual
            $venta->id_usuario = auth()->user()->id; //Asigna el ID del usuario autenticado
            $venta->total_venta = $request->input('valor_total_d_in'); //Establece el total de la venta
            $venta->save(); //Guarda la venta en la base de datos

            //Procesa cada producto asociado a la venta
            foreach ($request->input('productos') as $producto) {
                $productoId = $producto['id'];
                $cantidad = isset($producto['cantidad']) ? $producto['cantidad'] : 1;

                // Buscar el producto en la base de datos
                $productoDb = Producto::find($productoId);

                // Crea una nueva instancia de VentaProducto
                $ventaProducto = new VentaProducto();
                $ventaProducto->id_venta_producto = VentaProducto::max('id_venta_producto') + 1; //Asigna el siguiente ID de venta-producto
                $ventaProducto->id_venta = $venta->id_venta; //Asocia la venta con el producto
                $ventaProducto->id_producto = $producto['id'];
                $ventaProducto->cantidad_venta = $producto['cantidad'];
                $ventaProducto->save(); //Guarda la relación venta-producto en la base de datos 

                // Actualiza la cantidad del producto en stock
                $productoDb->cantidad -= $cantidad;
                $productoDb->save();
            }

            DB::commit();

            //Obtiene nuevamente los productos y ventas después de la transacción
            $productos = Producto::all();
            $ventas = Venta::with('productos.producto')->get();
            $ventas_lista = Venta::all();

            // Redirige a la vista de creación de ventas con un mensaje de éxito
            return redirect()->route('venta.crear')
            ->with('success', 'Venta creada exitosamente.')
            ->with('producto', $productos)
            ->with('ventas', $ventas)
            ->with('ventas_lista', $ventas_lista);

            //Reinvierte la transacción en caso de error
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
