<?php
namespace torneo;
use Illuminate\Database\Eloquent\Model;

class Fecha extends Model{


    protected $table='fechas';

    protected $fillable = ['fecha','observaciones','idtorneo','numero_fecha','imagen_equipo_ideal',
        'imagen_figura_fecha','imagen_fecha','es_play_off'];

    protected $primaryKey = 'idfecha';


}