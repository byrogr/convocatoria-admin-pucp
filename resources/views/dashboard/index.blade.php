@extends('template.layout')

@section('title', 'Escritorio')

@section('title_page', 'Escritorio')

@section('css_inline')
<style>
    .chat-body-custom {
        margin-left: 0px !important;
    }
</style>
@endsection

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
    </div><!-- end of .col-lg-12 -->
</div><!-- end of .row -->

<div class="row">
    <div class="col-lg-8">
		<div class="panel panel-primary">
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
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.panel-body -->
        </div><!-- end of .panel -->
	</div><!-- end of .col-lg-8 -->
    <div class="col-lg-4">
        <div id="chat" class="chat-panel panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-comments fa-fw"></i>
                Chat
            </div>
            <div id="chatcontent" class="panel-body">
                <ul class="chat">
                </ul><!-- end of .chat -->
            </div><!-- end of #chatcontent -->
            <div class="panel-footer">
                <div class="input-group">
                    <input id="message" type="text" class="form-control input-sm" placeholder="Escribe tu mensaje aqu&iacute;...">
                    <span class="input-group-btn">
                        <button class="btn btn-warning btn-sm" id="btn-chat" type="button">
                            Enviar!
                        </button>
                    </span>
                </div>
            </div><!-- end of .panel-footer -->
        </div><!-- end of #chat -->
    </div>
    <!-- /.col-lg-4 -->
</div><!-- end of .row -->

@endsection

@section('js_plugins')
<script src="http://localhost:3700/socket.io/socket.io.js"></script>
@endsection
@section('js_inline')
<script>
    jQuery(function($) {

       var socket = io.connect('http://localhost:3700');
       var $messageForm = $('#btn-chat');
       var $message = $('#message');
       var $chat = $('#chatcontent ul');

       $messageForm.click(function(e) {
           e.preventDefault();
           if( $message.val() != "" ) {
               socket.emit('sendMessage', $message.val());
               $message.val('');
           }
       });
       
       socket.on('newMessage', function(data) {
            var msj = '<li class="left clearfix"><div class="chat-body chat-body-custom"><div class="header"><strong class="primary-font">Roger Rojas</strong><small class="pull-right text-muted"><i class="fa fa-clock-o fa-fw"></i> hace 12 min.</small></div><p class="chat-message">'+ data.msg +'</p></div></li>';
            $chat.append(msj); 
       });
    });
</script>
@endsection