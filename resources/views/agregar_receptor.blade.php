<div class="modal fade bd-example-modal-lg" id="modal_agregar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title" style="color: black; text-align:center;">
                Agregar Receptor.
            </h6>
            </div>
      <form method="POST" action="agregarreceptor">
        @csrf

        <div class="modal-body" id="cont-modal">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label" style="color:black;">Nombre del Receptor:</label>
                <input type="text"  name="name" class="form-control" value="" required="true">
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
                
                {{ Form::select('tipodocumento', $opciones, 0, ['class' => 'form-select', 'id'=>'tipodocumento'])}}
                                
                           
                          
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label" style="color:black;">N° de Documento:</label>
                <input type="number"  name="ndocumento" class="form-control" value="" required="true">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label" style="color:black;">NRC:</label>
                <input type="text" name="nrc" class="form-control" value="" required="true">
            </div>  
            <div class="form-group">
    <label for="departamento" class="col-form-label" style="color:black;">Departamento:</label>
        <select class="form-control"  name="departamento" id="departamento">
            <option value="ahuachapan">Ahuachapán</option>
            <option value="cabanas">Cabañas</option>
            <option value="chalatenango">Chalatenango</option>
            <option value="cuscatlan">Cuscatlán</option>
            <option value="morazan">Morazán</option>
            <option value="lalibertad">La Libertad</option>
            <option value="lapaz">La Paz</option>
            <option value="launion">La Unión</option>
            <option value="sanmiguel">San Miguel</option>
            <option value="sansalvador">San Salvador</option>
            <option value="sanvicente">San Vicente</option>
            <option value="santaana">Santa Ana</option>
            <option value="sonsonate">Sonsonate</option>
            <option value="usulutan">Usulután</option>
        </select>
</div>

<div class="form-group">
    <label for="municipio" class="col-form-label" style="color:black;">Municipio:</label>
    <select class="form-control"  name="municipio" id="municipio">
        <!-- Los municipios se cargarán dinámicamente según el departamento seleccionado -->
    </select>
</div>
<div class="form-group">
                <label for="recipient-name" class="col-form-label" style="color:black;">Complemento:</label>
                <input type="text" name="complemento" class="form-control" value="" required="true">
            </div>
            

          
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
            <button type="submit" class="btn btn-primary">Agregar Receptor</button>
            
        </div>

    </form>
      
</div>
  </div>
</div>
<script src="{{asset('javascript/depmuni.js')}}">
         
</script>

