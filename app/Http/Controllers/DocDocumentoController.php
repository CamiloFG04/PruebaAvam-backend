<?php

namespace App\Http\Controllers;

use App\Helpers\DocCode;
use App\Helpers\ErrorResponseJson;
use App\Helpers\SuccessResponseJson;
use App\Models\DocDocumento;
use App\Models\ProProceso;
use App\Models\TipTipoDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DocDocumentoController extends Controller
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
            $documentos = DocDocumento::select('DOC_ID', 'DOC_NOMBRE', 'DOC_CODIGO', 'DOC_CONTENIDO', 'DOC_ID_TIPO', 'DOC_ID_PROCESO','TIP_NOMBRE','PRO_NOMBRE')
            ->leftJoin('tip_tipo_docs', 'doc_documentos.DOC_ID_TIPO', '=', 'tip_tipo_docs.TIP_ID')
            ->leftJoin('pro_procesos', 'doc_documentos.DOC_ID_PROCESO', '=', 'pro_procesos.PRO_ID')
            ->get();
            $procesos = ProProceso::all();
            $tipos = TipTipoDoc::all();

            $data = ['documentos' => $documentos,'procesos' => $procesos,'tipos' => $tipos];
            return SuccessResponseJson::successResponse($data,200);
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
                'DOC_NOMBRE' => 'required|string',
                'DOC_CONTENIDO' => 'required|string',
                'DOC_ID_TIPO' => 'required|integer|exists:tip_tipo_docs,TIP_ID',
                'DOC_ID_PROCESO' => 'required|integer|exists:pro_procesos,PRO_ID'
            ]);
            if ($validator->fails()) {
                $messageErrors = collect($validator->errors()->all())->implode("\n");
                return ErrorResponseJson::errorResponse($messageErrors,400);
            }

            $docCode = DocCode::createCode($request->DOC_ID_PROCESO,$request->DOC_ID_TIPO);
            // dd($docCode);

            $data = [];
            array_push($data,[
                ...$validator->validate(),
                'DOC_CODIGO' => $docCode,
            ]);

            $documento = DocDocumento::create($data[0]);
            return SuccessResponseJson::successResponse($documento,201);
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
            $documento = DocDocumento::find($id);
            if (!$documento) {
                return ErrorResponseJson::errorResponse(__('validation.hotel_not_exist'),404);
            }
            return SuccessResponseJson::successResponse($documento,200);
        } catch (\Throwable $th) {
            return ErrorResponseJson::errorResponse( $th->getMessage(),500);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $documento = DocDocumento::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'DOC_ID_TIPO' => 'integer|exists:tip_tipo_docs,TIP_ID',
                'DOC_ID_PROCESO' => 'integer|exists:pro_procesos,PRO_ID'
            ]);
            if ($validator->fails()) {
                $messageErrors = collect($validator->errors()->all())->implode("\n");
                return ErrorResponseJson::errorResponse($messageErrors,400);
            }

            $id_proceso = $request->DOC_ID_PROCESO ?? strval($documento->DOC_ID_PROCESO);
            $id_tipo = $request->DOC_ID_TIPO ?? strval($documento->DOC_ID_TIPO);
            $docCode = DocCode::editCode($documento,$id_proceso,$id_tipo);

            $data = $request->all();
            if ($docCode) {
                $data['DOC_CODIGO'] = $docCode;
            }
            // dd($data);
            $documento->update($data);
            return SuccessResponseJson::successResponse($documento,200);
        } catch (\Throwable $th) {
            return ErrorResponseJson::errorResponse( $th->getMessage(),500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DocDocumento::destroy($id);
            $data = ['message' => 'Documento eliminado','DOC_ID'=>$id];
            return SuccessResponseJson::successResponse($data,200);
        } catch (\Throwable $th) {
            return ErrorResponseJson::errorResponse($th->getMessage(),500);
        }
    }
}
