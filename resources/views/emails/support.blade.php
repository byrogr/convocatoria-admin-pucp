<html>
<head>
    <meta charset="utf-8">
</head>
<body>
-------------------------------------------------------------------------------<br>
Mensaje enviado desde Festival de Cine de Lima<br>
-------------------------------------------------------------------------------<br>
<br>
Soporte T&eacute;cnico<br>
-----------------------------<br>

Mensaje enviado por: {{ Auth::user()->name }} [{{ Auth::user()->email }}]<br>
<br>
<b>Asunto:</b> {{ $asunto }}<br><br>
<b>Mensaje:</b><br>
{{ $mensaje }}<br>
<br>
-------------------------------------------------------------------------------
</body>
</html>



