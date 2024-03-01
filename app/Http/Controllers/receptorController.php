<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class receptorController extends Controller
{
    
    public function cargarDatos(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://sheet.best/api/sheets/7ac9351f-0008-4a41-8f2a-699c146bea9e/tabs/receptor',
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

        return view('receptor ', compact('datos'));
    }

    public function agregarReceptor(Request $request){

       // Configuración de la solicitud cURL
    $apiUrl = 'https://sheet.best/api/sheets/7ac9351f-0008-4a41-8f2a-699c146bea9e/tabs/receptor';

    // Obtener los datos actuales de la hoja de cálculo
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Procesar la respuesta
    $data = json_decode($response, true);

    // Obtener el último ID utilizado
    if(!empty($data)){
        // Obtener el último ID utilizado
        $ultimoID = end($data)['id'];
        }
        else{
            $ultimoID =0;
        }

    // Incrementar el ID para el nuevo receptor
    $nuevoID = $ultimoID + 1;

    // Construir los datos del nuevo receptor
    $datos = array(
        'id' => $nuevoID,
        'nombre' => $request->name,
        'tipodocumento' => $request->tipodocumento,
        'ndocumento' => $request->ndocumento,
        'nrc' => $request->nrc,
        'departamento' => $request->departamento,
        'municipio' => $request->municipio,
        'complemento' => $request->complemento,
    );

    // Configurar la solicitud cURL para agregar el nuevo receptor
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
    ));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($datos));
    $response = curl_exec($ch);
    curl_close($ch);

    // Procesar la respuesta
    $data = json_decode($response, true);

    // Hacer algo con los datos obtenidos
    // print_r($data);

    // Cargar los datos actualizados
    return $this->cargarDatos();
    }

    public function modificar_receptor(Request $request){
        $datos = array(
            'nombre'=>$request->name,
            'tipodocumento'=>$request->tipodocumento,
            'ndocumento'=>$request->ndocumento,
            'nrc'=>$request->nrc,
            'departamento'=>$request->departamento,
            'municipio'=>$request->municipio,
            'complemento'=>$request->complemento,
            
        );
        
        
        $apiUrl = "https://sheet.best/api/sheets/7ac9351f-0008-4a41-8f2a-699c146bea9e/tabs/receptor/id/$request->idreceptor";
        $response = Http::patch($apiUrl,$datos);

        

      
        return $this->cargarDatos();

    }

    public function eliminar_receptor(Request $request){
      
        
        $apiUrl = "https://sheet.best/api/sheets/7ac9351f-0008-4a41-8f2a-699c146bea9e/tabs/receptor/id/$request->idreceptor";
        $response = Http::delete($apiUrl);

        

      
        return $this->cargarDatos();

    }

}
