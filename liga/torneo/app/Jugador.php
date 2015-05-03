<?php
namespace torneo;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model{


    protected $table='jugadores';

    protected $fillable = ['nombre_jugador','dni','pathfoto','idequipo','observaciones'];

    protected $primaryKey = 'idjugador';

    public function Equipo()
    {
        return $this->hasOne('torneo\Equipo', 'idequipo','idequipo');
    }

    public $goles_favor;
    public $goles_contra;
    public $cantidad_fechas_sancion;

}