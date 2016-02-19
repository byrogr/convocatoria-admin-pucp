<div class="modal fade" id="mdlSoporte" tabindex="-1" role="dialog" aria-labelledby="mdlSoporteLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="mdlSoporteLabel">
                    <i class="fa fa-envelope"></i> Env&iacute;o de mensaje a soporte t&eacute;cnico
                </h4><!-- end of .modal-title -->
            </div><!-- end of .modal-header -->
            <form id="frmSoporte" method="post" action="">
                <div class="alert alert-success" role="alert" id="alert-enviado">
                    <strong>Enhorabuena!</strong> Su mensaje fue enviado con &eacute;xito.
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="txtAsunto">Asunto</label>
                        <input type="text" class="form-control" name="asunto" id="txtAsunto" placeholder="Escriba su asunto...">
                    </div>
                    <div class="form-group">
                        <label for="txaAsunto">Mensaje</label>
                        <textarea class="form-control" id="txaMensaje" name="mensaje" rows="3" placeholder="Escriba su mensaje..."></textarea>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                </div><!--- end of modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" id="btnEnviar">
                        <i class="fa fa-paper-plane"></i> Enviar
                    </button>
                </div><!-- end of modal-footer -->
            </form><!-- end of #frmSoporte -->
        </div><!-- end of .modal-content -->
    </div><!-- end of .modal-dialog -->
</div><!-- end of .modal -->