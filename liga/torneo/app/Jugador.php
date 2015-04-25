<?php
namespace torneo;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model{


    protected $table='jugadores';

    protected $fillable = ['nombre_jugador','dni','pathfoto','idequipo','observaciones'];

    protected $primaryKey = 'idjugador';

}