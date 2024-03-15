<div class="modal fade bd-example-modal-lg" id="modal_generar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title" style="color: black; text-align:center;">
                Generar Token.
            </h6>
            </div>
      <form method="POST" action="generartoken">
        @csrf

        <div class="modal-body" id="cont-modal">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label" style="color:black;">NIT:</label>
                <input type="text"  name="nit" value="06141101171056" class="form-control" value="" required="true">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label" style="color:black;">Contraseña: </label>
                <input type="password" value="Un!c@ct3m0$@/*3"  name="pass" class="form-control" value="" required="true">
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
            <button type="submit" class="btn btn-primary">Generar Token</button>
            
        </div>
    </form>
      
</div>
  </div>
</div>