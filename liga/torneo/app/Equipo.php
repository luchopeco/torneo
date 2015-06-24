<?php
namespace torneo;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model{


    protected $table='equipos';

    protected $fillable = ['nombre_equipo','escudo','foto','es_libre','nombre_usuario','clave','observaciones','mensaje'];

    protected $primaryKey = 'idequipo';

    public function esLibre()
    {
        if($this->es_libre ==1)
        {
            return 'SI';
        }
        else
        {
            return 'NO';
        }
    }

    public function ListJugadores()
    {
        return $this->hasMany('torneo\Jugador','idequipo', 'idequipo');
    }

}