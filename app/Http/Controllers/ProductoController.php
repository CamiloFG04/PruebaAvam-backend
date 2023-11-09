<?php

namespace App\Http\Controllers;

use App\Helpers\ErrorResponseJson;
use App\Helpers\SuccessResponseJson;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
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
            $productos = Producto::all();
            return SuccessResponseJson::successResponse($productos,200);
        } catch (\Throwable $th) {
            return ErrorResponseJson::errorResponse($th->getMessage(),500);
        }
    }
}
