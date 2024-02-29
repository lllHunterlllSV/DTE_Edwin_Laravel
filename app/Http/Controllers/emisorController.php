<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class emisorController extends Controller
{
    
    public function cargarDatos(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://sheet.best/api/sheets/7ac9351f-0008-4a41-8f2a-699c146bea9e/tabs/emisor',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
            $datos=json_decode($response, true);

        return view('emisor', compact('datos'));
    }

    public function agregarEmisor(Request $request){

         $datos = array(
            'id'=>'=FILA()-1',
            'nombre'=>$request->name,
            'nombrecomercial'=>$request->comercial,
            'actividad'=>$request->actividad,
            'nit'=>$request->nit,
            'nrc'=>$request->nrc,
            'departamento'=>$request->departamento,
            'municipio'=>$request->municipio,
            'complemento'=>$request->complemento,
            'telefono'=>$request->phone,
            'correo'=>$request->email,
        );
        $apiUrl = 'https://sheet.best/api/sheets/7ac9351f-0008-4a41-8f2a-699c146bea9e/tabs/emisor';

        // Configuración de la solicitud cURL
        $ch = curl_init($apiUrl);

        // Configurar opciones cURL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Devolver el resultado en lugar de imprimirlo directamente
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
        ));

        // Si estás enviando datos
        curl_setopt($ch, CURLOPT_POST, 1); // Método POST
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($datos)); // Datos a enviar en formato JSON
        

        // Ejecutar la solicitud cURL
        $response = curl_exec($ch);

        // Verificar errores
        if (curl_errno($ch)) {
            die('Error cURL: ' . curl_error($ch));
        }

        // Cerrar la conexión cURL
        curl_close($ch);

        // Procesar la respuesta
        $data = json_decode($response, true);

        // Hacer algo con los datos obtenidos
        //print_r($data);
    
        return $this->cargarDatos();
    }

}
