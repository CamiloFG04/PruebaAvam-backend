<?php

namespace App\Http\Controllers;

use App\Helpers\ErrorResponseJson;
use App\Helpers\SuccessResponseJson;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
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
            $clientes = Cliente::all();
            return SuccessResponseJson::successResponse($clientes,200);
        } catch (\Throwable $th) {
            return ErrorResponseJson::errorResponse($th->getMessage(),500);
        }
    }
}
