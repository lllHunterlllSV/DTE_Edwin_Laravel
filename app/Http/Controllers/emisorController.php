<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class emisorController extends Controller
{
    
    public function cargarDatos(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://sheetdb.io/api/v1/ckohkinmkc10t?sheet=emisor',
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

        // Configuración de la solicitud cURL
        $apiUrl = 'https://sheetdb.io/api/v1/ckohkinmkc10t?sheet=emisor';
    
        // Obtener los datos actuales de la hoja de cálculo
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
    
        // Procesar la respuesta
        $data = json_decode($response, true);
    

        if(!empty($data)){
        // Obtener el último ID utilizado
        $ultimoID = end($data)['id'];
        }
        else{
            $ultimoID =0;
        }
        // Incrementar el ID para el nuevo emisor
        $nuevoID = $ultimoID + 1;
    
        // Construir los datos del nuevo emisor
        $datos = array(
            'id' => $nuevoID,
            'nombre' => $request->name,
            'nombrecomercial' => $request->comercial,
            'actividad' => $request->actividad,
            'nit' => $request->nit,
            'nrc' => $request->nrc,
            'departamento' => $request->departamento,
            'municipio' => $request->municipio,
            'complemento' => $request->complemento,
            'telefono' => $request->phone,
            'correo' => $request->email,
        );
    
        // Configurar la solicitud cURL para agregar el nuevo emisor
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
    

    public function modificar_emisor(Request $request){
        $datos = array(
            'nombre'=>$request->name,
            'actividad'=>$request->actividad,
            'nit'=>$request->nit,
            'telefono'=>$request->phone,
            'correo'=>$request->email,
            'departamento'=>$request->departamento,
            'municipio'=>$request->municipio,
            
        );
        
        
        $apiUrl = "https://sheetdb.io/api/v1/ckohkinmkc10t/id/$request->idemisor?sheet=emisor";
        $response = Http::patch($apiUrl,$datos);

        

      
        return $this->cargarDatos();

    }

    public function eliminar_emisor(Request $request){
      
        
        $apiUrl = "https://sheetdb.io/api/v1/ckohkinmkc10t/id/$request->idemisor?sheet=emisor";
        $response = Http::delete($apiUrl);

        
        
      
        return $this->cargarDatos();

    }

}
