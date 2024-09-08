<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\Proveedor;
use App\Models\Categoria;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Venta;

class ProductoController extends Controller
{
    /**
     * Este método cálcula la fecha actual y la fecha 5 días después y recupera
     * los productos vencidos y los productos que están próximos a vencer dentro de los próximos 5 días
     * Luego devuelve la vista inicio que muestra esos productos
     */
    public function index()
    {
        $productos = Producto::where('vigencia', 1)->get();
        return view('producto.index', compact('productos'));
    }

    public function inicio()
    {
        $hoy = Carbon::now();
        $cincoDiasDespues = $hoy->copy()->addDays(5);
        $mesActual = Carbon::now()->startOfMonth();

        $ventasHoy = Venta::whereDate('fecha_venta', $hoy)->count();
        $sumaVentasHoy = Venta::whereDate('fecha_venta', $hoy)->sum('total_venta');

        // Contar ventas de este mes
        $ventasMes = Venta::where('fecha_venta', '>=', $mesActual)->count();
        
        // Contar ventas totales
        $ventasTotales = Venta::count();
                
        $productosVencidos = Producto::where('fecha_vencimiento', '<', Carbon::now())->where('vigencia', 1)->get();
        $productosProximosAVencer = Producto::where('fecha_vencimiento', '>=', $hoy)
        ->where('fecha_vencimiento', '<=', $cincoDiasDespues)
        ->where('vigencia', 1)
        ->get();
        return view('inicio', compact('productosVencidos','productosProximosAVencer','ventasHoy','ventasMes','ventasTotales','sumaVentasHoy'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marcas = Marca::all();
        $proveedor = Proveedor::where('vigencia',1)->get();
        $categoria = Categoria::all();
        return view('producto.crear', compact('marcas','proveedor','categoria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        DB::enableQueryLog();
        Producto::create($request->all());
        $queries = DB::getQueryLog();
        $productos = Producto::where('vigencia',1)->get();
        return view('producto.index', compact('productos'));
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
        $marcas = Marca::all();
        $proveedor = Proveedor::all();
        $categoria = Categoria::all();
        $producto = Producto::findOrFail($id);
        return view('producto.editar', compact('producto','marcas','proveedor','categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->update($request->all());

        return redirect()->route('producto.index')->with(['success'=>'Producto actualizado correctamente','producto_id' => $producto->id_producto]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function desactivar($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->vigencia = 0;
        $producto->save();

        return redirect()->route('producto.index')->with(['success2'=>'Producto eliminado correctamente','producto_id' => $producto->id_producto]);
    }

    public function buscar(Request $request)
    {
        $codigoBarra = $request->get('codigo_barra');
        $producto = Producto::where('codigo_barra', $codigoBarra)->where('vigencia', 1)->first();

        if ($producto) {
            return response()->json([
                'success' => true,
                'producto' => $producto
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Producto no encontrado o no vigente.'
            ]);
        }
    }
}
