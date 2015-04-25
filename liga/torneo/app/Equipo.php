<?php
namespace torneo;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model{


    protected $table='equipos';

    protected $fillable = ['nombre_equipo','escudo','foto'];

    protected $primaryKey = 'idequipo';


    public function ListJugadores()
    {
        return $this->hasMany('torneo\Jugador','idequipo', 'idequipo');
    }

}