<?php
namespace App\Helpers;

use App\Models\DocDocumento;
use App\Models\ProProceso;
use App\Models\TipTipoDoc;

class DocCode {
    public static function createCode(string $id_proceso, string $id_tipo): string {
        try {

            $UltimoDocumento = DocDocumento::latest()->first();
            // return $UltimoDocumento;
            $proceso = ProProceso::find($id_proceso);
            $tipo = TipTipoDoc::find($id_tipo);

            if(!$UltimoDocumento)  return $tipo->TIP_PREFIJO . '-' . $proceso->PRO_PREFIJO . '-1';

            $UltimoDocumento = explode('-',$UltimoDocumento->DOC_CODIGO)[2];
            return $tipo->TIP_PREFIJO . '-' . $proceso->PRO_PREFIJO . '-' . ($UltimoDocumento + 1);

        } catch (\Throwable $th) {
            return ErrorResponseJson::errorResponse($th->getMessage(),500);
        }
    }

    public static function editCode(DocDocumento $documento, string $id_proceso, string $id_tipo): string | null {
        try {

            $prefijoActual = $documento->DOC_CODIGO;
            $numeroActual = explode('-',$prefijoActual)[2];

            $proceso = ProProceso::find($id_proceso);
            $tipo = TipTipoDoc::find($id_tipo);

            $prefijoModificado = $tipo->TIP_PREFIJO . '-' . $proceso->PRO_PREFIJO . '-' . $numeroActual;

            if ($prefijoActual === $prefijoModificado) return null;
            return $prefijoModificado;

        } catch (\Throwable $th) {
            return ErrorResponseJson::errorResponse($th->getMessage(),500);
        }
    }
}
