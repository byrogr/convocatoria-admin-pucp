<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Movie
 */
class Movie extends Model
{

    public $timestamps = false;

    protected $table = 'movies';

    protected $fillable = [
        'filme_titulo_original',
        'filme_titulo_en',
        'filme_titulo_es',
        'filme_pais_produccion',
        'filme_idioma',
        'filme_version_original',
        'filme_subtitulos',
        'filme_tipo',
        'filme_minutos',
        'filme_formato',
        'filme_color',
        'filme_blanco_negro',
        'filme_opera_prima',
        'filme_copia_proceso_lab',
        'filme_anio_produccion',
        'filme_fecha_estreno_pais',
        'filme_festivales_participado',
        'filme_premios_ganados',
        'produccion_nombre_productor',
        'produccion_compania_productora1',
        'produccion_direccion1',
        'produccion_telefono1',
        'produccion_email1',
        'produccion_compania_coproductora',
        'produccion_direccion2',
        'produccion_telefono2',
        'produccion_email2',
        'produccion_ventas_mundiales',
        'produccion_direccion3',
        'produccion_telefono3',
        'produccion_email3',
        'produccion_compania_distribuidora',
        'produccion_direccion4',
        'produccion_telefono4',
        'produccion_email4',
        'ficha_director',
        'ficha_direccion',
        'ficha_telefono',
        'ficha_email',
        'ficha_autor_libro_original',
        'ficha_guionista',
        'ficha_actores_principales',
        'ficha_compositor',
        'ficha_director_fotografia',
        'ficha_director_arte',
        'ficha_editor',
        'ficha_sonido',
        'ficha_sipnosis',
        'ficha_link_pelicula',
        'copias_nombre_recibe',
        'copias_direccion_recibe',
        'copias_telefono_recibe',
        'copias_email_recibe',
        'copias_nombre_devuelta',
        'copias_direccion_devuelta',
        'copias_telefono_devuelta',
        'copias_email_devuelta',
        'acuerdo_representada_por',
        'acuerdo_direccion',
        'acuerdo_telefono',
        'acuerdo_email',
        'acuerdo_fecha',
        'acuerdo_dni',
        'created_at',
        'pdf_name'
    ];

    protected $guarded = [];

        
}