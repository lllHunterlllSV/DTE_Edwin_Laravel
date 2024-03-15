<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class tokenController extends Controller
{



    
    public function obtenerUltimoToken($datos) {
       
    
       
    
        $now = new \DateTime();
        $tokensValidos = $this->obtenerTokensValidos($datos);
    
        if (empty($tokensValidos)) {
            echo "No se encontraron tokens generados en las últimas 24 horas.";
        } else {
            // Obtener la fecha y hora actual en el formato deseado
            $nowFecha = $now->format('Y-m-d');
            $nowHora = $now->format('H:i:s');
    
            // Filtrar los tokens válidos que se hayan generado en las últimas 24 horas
            $tokensValidos = array_filter($tokensValidos, function($token) use ($nowFecha, $nowHora) {
                return $token['fecha'] == $nowFecha && strtotime($token['hora']) > strtotime('-24 hours');
            });
    
            if (empty($tokensValidos)) {
                echo "No se encontraron tokens generados en las últimas 24 horas.";
                $ultimoToken['hora']=0;
                $ultimoToken['fecha']=0;
                return $ultimoToken;
            } else {
                // Ordenar los tokens válidos por fecha en orden descendente
                usort($tokensValidos, function($a, $b) {
                    return strtotime($b['hora']) - strtotime($a['hora']);
                });
                
                // Obtener el último token válido
                $ultimoToken = reset($tokensValidos);
                
                // Aquí puedes hacer lo que necesites con el último token
                // Por ejemplo, mostrarlo en pantalla
                echo "El último token generado en las últimas 24 horas es: " . $ultimoToken['token'];
                return $ultimoToken;


            }
        }
        
    }
    
    
    // Método para obtener tokens válidos en las últimas 24 horas
    public function obtenerTokensValidos($datos) {
        // Obtener la fecha y hora actual en el formato deseado
        date_default_timezone_set('America/El_Salvador'); // Establecer la zona horaria a El Salvador
        $now = new \DateTime();
        $nowFecha = $now->format('Y-m-d');
        $nowHora = $now->format('H:i:s');
    
        // Filtrar los tokens válidos que se hayan generado en las últimas 24 horas
        $tokensValidos = array_filter($datos, function($token) use ($nowFecha, $nowHora) {
            return $token['fecha'] == $nowFecha && strtotime($token['hora']) > strtotime('-24 hours');
        });
    
        return $tokensValidos;
    }
    
    
    public function cargarDatos(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://sheetdb.io/api/v1/ckohkinmkc10t?sheet=token',
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
            
           
           if(!empty($datos)){
            $ultimoToken = $this->obtenerUltimoToken($datos);
            
            
            // Pasar el último token y los datos a la vista
            return view('token', compact('datos', 'ultimoToken'));
           }
           else{
            $ultimoToken['hora']=0;
            $ultimoToken['fecha']=0;
            return view('token', compact('datos', 'ultimoToken'));
           }
           
        
    }

    public function generarToken(Request $request){
            $user=$request->nit;
            $pwd=$request->pass;
            // $user = "06141101171056";
            // $pwd = "Un!c@ct3m0$@/*3";
            $apiUrl = "https://apitest.dtes.mh.gob.sv/seguridad/auth?user=".$user."&pwd=".$pwd;
 
            $response = Http::post($apiUrl);
            $token = json_decode($response)->body->token;
            
            $this->guardarToken($token);
           
            return $this->cargarDatos();
    }



    public function guardarToken($token){

            // Obtener la fecha y la hora actual
        $now = new \DateTime();

// Obtener la fecha en el formato deseado (por ejemplo, 'Y-m-d' para año-mes-día)
        $fecha = $now->format('Y-m-d');

// Obtener la hora en el formato deseado (por ejemplo, 'H:i:s' para horas:minutos:segundos)
        $hora = $now->format('H:i:s');
        
        // Configuración de la solicitud cURL
        $apiUrl = 'https://sheetdb.io/api/v1/ckohkinmkc10t?sheet=token';
    
        // Obtener los datos actuales de la hoja de cálculo
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
    
        // Procesar la respuesta
        $data = json_decode($response, true);
    

    
        // Construir los datos del nuevo emisor
       

        $datos = array(
            'fecha' => $fecha,
            'hora' => $hora,
            'token' => $token,
            
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

}