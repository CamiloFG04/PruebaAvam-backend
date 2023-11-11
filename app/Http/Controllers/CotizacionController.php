<?php

namespace App\Http\Controllers;

use App\Helpers\ErrorResponseJson;
use App\Helpers\SuccessResponseJson;
use App\Models\Cotizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CotizacionController extends Controller
{
     /**
     * Create a new DocDocumentoController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $cotizaciones = Cotizacion::with('cotizacionProducto')->with('cliente')->get();
            return SuccessResponseJson::successResponse($cotizaciones,200);
        } catch (\Throwable $th) {
            return ErrorResponseJson::errorResponse($th->getMessage(),500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'cliente_id' => 'required|integer|exists:clientes,cliente_id',
                'valor' => 'required',
                'fecha' => 'required',
                'productos' => 'required',
            ]);
            if ($validator->fails()) {
                $messageErrors = collect($validator->errors()->all())->implode("\n");
                return ErrorResponseJson::errorResponse($messageErrors,400);
            }
            $data = $request->except("productos");
            $productos = $request->productos;
            // dd($productos);
            $cotizacion = Cotizacion::create($data);
            foreach ($productos as $producto) {
                $cotizacion->cotizacionProducto()->attach([$producto['producto'] =>["cantidad"=>$producto['cantidad']]]);
            }

            return SuccessResponseJson::successResponse($cotizacion,201);
        } catch (\Throwable $th) {
            return ErrorResponseJson::errorResponse($th->getMessage(),500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $cotizacion = Cotizacion::find($id);
            if (!$cotizacion) {
                return ErrorResponseJson::errorResponse('La cotizacion no existe',404);
            }
            return SuccessResponseJson::successResponse($cotizacion,200);
        } catch (\Throwable $th) {
            return ErrorResponseJson::errorResponse( $th->getMessage(),500);
        }
    }
}
