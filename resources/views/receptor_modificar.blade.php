


<div class="modal fade bd-example-modal-lg" id="modal_modificar{{ $receptor['id'] }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title" style="color: black; text-align:center;">
                Actualizar datos de emisor.
            </h6>
            </div>
    <form method="POST" action="modificarreceptor">
        @csrf

        <div class="modal-body" id="cont-modal">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label" style="color:black;">Nombre del Receptor:</label>
                <input type="text"  name="name" class="form-control" value="{{ $receptor['nombre']}}" required="true">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label" style="color:black;">Tipo Documento:</label>
                @php 
                use Collective\Html\FormFacade as Form;

                $opciones= array(
                                "FE"=> 'Factura Electrónica',
                                "CCE"=>'Comprobante de Crédito Fiscal. Electrónico',
                                "NR"=> 'Nota de Remisión Electrónico',
                                "NC"=> 'Nota de Crédito Electrónico.vv',
                                "ND"=> 'Nota de Débito Electrónico',
                                "CR"=> 'Comprobante de Retención Electrónico',
                                "CL"=> 'Comprobante de Liquidación Electrónico',
                                "DCLE"=>'Documento Contable de Liquidación Electrónico',
                                "FEE"=>'Factura de Exportación Electrónica',
                                "FSE"=>'Factura de Sujeto Excluido Electrónica',
                                "CD"=> 'Comprobante de Donación Electrónico'
                                );
                                
                @endphp
                
                {{ Form::select('tipodocumento', $opciones, $receptor['tipodocumento'], ['class' => 'form-select', 'id'=>'tipodocumento'])}}
                                
                           
                          
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label" style="color:black;">N° documento:</label>
                <input type="number" name="ndocumento" class="form-control" value="{{ $receptor['ndocumento']}}" required="true">
            </div>  
            <div class="form-group">
                <label for="recipient-name" class="col-form-label" style="color:black;">NRC:</label>
                <input type="number" name="nrc" class="form-control" value="{{ $receptor['nrc']}}" required="true">
            </div>  
            <div class="form-group">
                <label for="recipient-name" class="col-form-label" style="color:black;">Departamento:</label>
                @php 
                

                $opciones= array(
                               
                                "ahuachapan"=>'Ahuachapán',
                                "cabanas"=>'Cabañas',
                                "chalatenango"=>'Chalatenango',
                                "cuscatlan"=>'Cuscatlán',
                                "morazan"=>'Morazán',
                                "lalibertad"=>'La Libertad',
                                "lapaz"=>'La Paz',
                                "launion"=>'La Unión',
                                "sanmiguel"=>'San Miguel',
                                "sansalvador"=>'San Salvador',
                                "sanvicente"=>'San Vicente',
                                "santaana"=>'Santa Ana',
                                "sonsonate"=>'Sonsonate',
                                "usulutan"=>'Usulután'
                                
                                );
                                
                @endphp
                
                {{ Form::select('departamento', $opciones, $receptor['departamento'], ['class' => 'form-select', 'id' => 'departamentomodi' . $receptor['id']]) }}

                                
                           
                          
            </div>
            <div class="form-group">
    <label for="municipiomodi" class="col-form-label" style="color:black;">Municipio:</label>
    <select class="form-control"  name="municipio" id="municipiomodi{{ $receptor['id'] }}">
        <!-- Los municipios se cargarán dinámicamente según el departamento seleccionado -->
    </select>
</div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label" style="color:black;">Complemento:</label>
                <input type="text" name="complemento" class="form-control" value="{{ $receptor['complemento']}}" required="true">
            </div>
           

            <input type="hidden" value="{{$receptor['id']}}" name="idreceptor">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
            <button type="submit" class="btn btn-primary">Modificar Emisor</button>
            
        </div>

    </form>
      
</div>
  </div>
</div>
<script >
         var municipios = {
    ahuachapan: ["Ahuachapán", "Apaneca", "Atiquizaya", "Concepción de Ataco", "El Refugio", "Guaymango", "Jujutla", "San Francisco Menéndez", "San Lorenzo", "San Pedro Puxtla", "Tacuba", "Turín"],
    cabanas: ["Cinquera", "Dolores (Villa Doleres)", "Guacotecti", "Ilobasco", "Jutiapa", "San Isidro", "Sensuntepeque", "Tejutepeque", "Victoria"],
	chalatenango:["Agua Caliente","Arcatao","Azacualpa","Chalatenango","Citalá","Comalapa","Concepción Quezaltepeque","Dulce Nombre de María","El Carrizal","El Paraíso","La Laguna","La Palma","La Reina","Las Vueltas","Nombre de Jesús","Nueva Concepción","Nueva Trinidad","Ojos de Agua","Potonico","San Antonio de la Cruz","San Antonio Los Ranchos","San Fernando","San Francisco Lempa","San Francisco Morazán","San Ignacio","San Isidro Labrador","San José Cancasque (Cancasque)","San José Las Flores","San Luis del Carmen","San Miguel de Mercedes","San Rafael","Santa Rita","Tejutla"],
	cuscatlan:["Candelaria","Cojutepeque","El Carmen","El Rosario","Monte San Juan","Oratorio de Concepción","San Bartolomé Perulapía","San Cristóbal","San José Guayabal","San Pedro Perulapán","San Rafael Cedros","San Ramón","Santa Cruz Analquito","Santa Cruz Michapa","Suchitoto","Tenancingo"],
	morazan:["Arambala","Cacaopera","Chilanga","Corinto","Delicias de Concepción","El Divisadero","El Rosario","Gualococti","Guatajiagua","Joateca","Jocoaitique","Jocoro","Lolotiquillo","Meanguera","Osicala","Perquín","San Carlos","San Fernando","San Francisco Gotera","San Isidro","San Simón","Sensembra","Sociedad","Torola","Yamabal","Yoloaiquín"],
	lalibertad:["Antiguo Cuscatlán","Chiltiupán","Ciudad Arce","Colón","Comasagua","Huizúcar","Jayaque","Jicalapa","La Libertad","Santa Tecla (Nueva San Salvador)","Nuevo Cuscatlán","San Juan Opico","Quezaltepeque","Sacacoyo","San José Villanueva","San Matías","San Pablo Tacachico","Talnique","Tamanique","Teotepeque","Tepecoyo","Zaragoza"],
	lapaz:["Cuyultitán","El Rosario (Rosario de La Paz)","Jerusalén","Mercedes La Ceiba","Olocuilta","Paraíso de Osorio","San Antonio Masahuat","San Emigdio","San Francisco Chinameca","San Juan Nonualco","San Juan Talpa","San Juan Tepezontes","San Luis La Herradura","San Luis Talpa","San Miguel Tepezontes","San Pedro Masahuat","San Pedro Nonualco","San Rafael Obrajuelo","Santa María Ostuma","Santiago Nonualco","Tapalhuaca","Zacatecoluca"],
	launion:["Anamorós","Bolívar","Concepción de Oriente","Conchagua","El Carmen","El Sauce","Intipucá","La Unión","Lilisque","Meanguera del Golfo","Nueva Esparta","Pasaquina","Polorós","San Alejo","San José","Santa Rosa de Lima","Yayantique","Yucuaiquín"],
	sanmiguel:["Carolina","Chapeltique","Chinameca","Chirilagua","Ciudad Barrios","Comacarán","El Tránsito","Lolotique","Moncagua","Nueva Guadalupe","Nuevo Edén de San Juan","Quelepa","San Antonio del Mosco","San Gerardo","San Jorge","San Luis de la Reina","San Miguel","San Rafael Oriente","Sesori","Uluazapa"],
	sansalvador:["Aguilares","Apopa","Ayutuxtepeque","Ciuddad Delgado","Cuscatancingo","El Paisnal","Guazapa","Ilopango","Mejicanos","Nejapa","Panchimalco","Rosario de Mora","San Marcos","San Martín","San Salvador","Santiago Texacuangos","Santo Tomás","Soyapango","Tonacatepeque"],
	sanvicente:["Apastepeque","Guadalupe","San Cayetano Istepeque","San Esteban Catarina","San Ildefonso","San Lorenzo","San Sebastián","San Vicente","Santa Clara","Santo Domingo","Tecoluca","Tepetitán","Verapaz"],
	santaana:["Candelaria de la Frontera","Chalchuapa","Coatepeque","El Congo","El Porvenir","Masahuat","Metapán","San Antonio Pajonal","San Sebastián Salitrillo","Santa Ana","Santa Rosa Guachipilín","Santiago de la Frontera","Texistepeque"],
	sonsonate:["Acajutla","Armenia","Caluco","Cuisnahuat","Izalco","Juayúa","Nahuizalco","Nahulingo","Salcoatitán","San Antonio del Monte","San Julián","Santa Catarina Masahuat","Santa Isabel Ishuatán","Santo Domingo de Guzmán","Sonsonate","Sonzacate"],
	usulutan:["Alegría","Berlín","California","Concepción Batres","El Triunfo","Ereguayquín","Estanzuelas","Jiquilisco","Jucuapa","Jucuarán","Mercedes Umaña","Nueva Granada","Ozatlán","Puerto El Triunfo","San Agustín","San Buenaventura","San Dionisio","San Francisco Javier","Santa Elena","Santa María","Santiago de María","Tecapán","Usulután"],
};

// Función para cargar los municipios según el departamento seleccionado
function cargarMunicipios() {
    var departamentoSeleccionado = document.getElementById("departamentomodi{{ $receptor['id'] }}").value;
    var municipiosDepartamento = municipios[departamentoSeleccionado];

    var selectMunicipio = document.getElementById("municipiomodi{{ $receptor['id'] }}");
    // Limpiar opciones anteriores
    selectMunicipio.innerHTML = "";

    // Agregar las nuevas opciones
    municipiosDepartamento.forEach(function(municipio) {
        var option = document.createElement("option");
        option.text = municipio;
        selectMunicipio.add(option);

        // Verificar si el municipio coincide con el almacenado previamente
        if (municipio === "{{ $receptor['municipio'] }}") {
            option.selected = true; // Seleccionar el municipio almacenado
        }
    });
}

// Asignar el evento onchange al select de departamento
document.getElementById("departamentomodi{{ $receptor['id'] }}").onchange = cargarMunicipios;

// Cargar los municipios inicialmente
cargarMunicipios();
</script>


<!-- Large modal -->


