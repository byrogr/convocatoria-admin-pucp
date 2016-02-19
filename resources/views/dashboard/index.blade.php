@extends('template.layout')

@section('title', 'Escritorio')

@section('title_page', 'Escritorio')

@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-film fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
	                    <div class="huge">{{ $qMovie }}</div>
	                    <div>Peliculas en total</div>
	                </div>
				</div><!-- end of .row -->
			</div><!-- end of .panel-heading -->
			<a href="{{ route('peliculas') }}">
                <div class="panel-footer">
                    <span class="pull-left">Ver detalles</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
		</div><!-- end of .panel -->

		<div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-film fa-fw"></i> &Uacute;ltimas peliculas                
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
							            <th>TITULO ORIGINAL</th>
							            <th>TITULO EN </th>
							            <th>TITULO ES </th>
							            <th>FECHA </th>
                                        <th>OPCIONES </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lastMovies as $p)
							    		<tr>
								            <td>{{ $p->id }}</td>
								            <td>{{ utf8_decode($p->filme_titulo_original) }}</td>
											<td>{{ utf8_decode($p->filme_titulo_en) }} </td>
											<td>{{ utf8_decode($p->filme_titulo_es) }}</td>
											<td>{{ $p->created_at }}</td>
                                            <td>
                                                <?php $pdf = "http://festivaldelima.com/2015/wp-content/themes/festivaldelima/modulos/convocatoria/docs/" . $p->pdf_name; ?>
                                                <a href="<?= $pdf; ?>" class="btn btn-info" target="_blank">
                                                    Descargar PDF <i class="fa fa-download"></i> 
                                                </a>
                                            </td>
								        </tr>
							    	@endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->

                        <a href="{{ route('peliculas') }}" class="btn btn-primary pull-right">
                            Ver todas las peliculas <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                    <!-- /.col-lg-12 (nested) -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.panel-body -->
        </div>
	</div><!-- end of .col-lg-12 -->
</div><!-- end of .row -->
@include('emails.form')
@endsection
@section('js_inline')
    <script>
        $(document).ready(function() {
            var $form = $('#frmSoporte');
            $('#alert-enviado').hide();
            $form.submit(function(event) {
                event.preventDefault();
                var data = $(this).serialize();
                $.ajax({
                    url: '{{ route('send')  }}',
                    data: data,
                    type: 'post',
                    dataType: 'json',
                    beforeSend: function() {
                        $('#btnEnviar').html('<i class="fa fa-circle-o-notch fa-spin"></i> Enviando...');
                    },
                    success: function(res) {
                        if ( res.status == 'success' ) {

                            setTimeout(function() {
                                $('#btnEnviar').html('<i class="fa fa-paper-plane"></i> Enviar');
                                $('#alert-enviado').slideDown('normal');
                                setTimeout(function() {
                                    $('#alert-enviado').slideUp('normal', function() {
                                        $('#txtAsunto').val('');
                                        $('#txaMensaje').val('');
                                    });
                                }, 2000);
                            }, 1000);
                        }
                    }
                });
            });
        });
    </script>
@endsection