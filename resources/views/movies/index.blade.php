@extends('template.layout')

@section('title', 'Pel&iacute;culas')

@section('css_plugins')
<!-- DataTables CSS -->
<link href="{{ asset('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
<!-- DataTables Responsive CSS -->
<link href="{{ asset('assets/bower_components/datatables-responsive/css/dataTables.responsive.css') }}" rel="stylesheet">
@endsection

@section('title_page', 'Peliculas')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		Listado de peliculas
	</div><!-- end of .panel-heading -->
	<div class="panel-body">
		<table id="tblPeliculas" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="tabla de peliculas">
		    <thead>
		        <tr>
		            <th>ID</th>
		            <th>TITULO ORIGINAL</th>
		            <th>TITULO EN </th>
		            <th>TITULO ES </th>
		            <th>FECHA </th>
		            <th>OPCIONES </th>
		        </tr>
		    </thead>
		    <tbody>
		    	@foreach ($peliculas as $p)
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
		</table><!-- end of #tblPeliculas -->
	</div><!-- end of .panel-body -->
</div><!-- end of .panel -->

@include('emails.form')
@endsection

@section('js_plugins')
<!-- DataTables JavaScript -->
<script src="{{ asset('assets/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>
@endsection

@section('js_inline')
<script>
	$(document).ready(function() {
	    $('#tblPeliculas').DataTable({
	            responsive: true,
	            language: {
	            	url: "{{ asset('assets/bower_components/datatables/media/js/localisation/es_ES.json') }}"
			    }
	    });
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
							$('#alert-enviado').show();
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