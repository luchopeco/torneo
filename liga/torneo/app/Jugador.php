<?php
namespace torneo;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model{


    protected $table='jugadores';

    protected $fillable = ['nombre_jugador','dni','pathfoto','idequipo','observaciones','certificado','delegado','direccion','mail','obra_social','telefono','grupo_sanguineo'];

    protected $primaryKey = 'idjugador';

    public function Equipo()
    {
        return $this->hasOne('torneo\Equipo', 'idequipo','idequipo');
    }

    public $goles_favor;
    public $goles_contra;
    public $cantidad_fechas_sancion;

    public function esDelegado()
    {
        if($this->delegado ==1)
        {
            return 'SI';
        }
        else
        {
            return 'NO';
        }
    }
    public function entregoCertificado()
    {
        if($this->certificado ==1)
        {
            return 'SI';
        }
        else
        {
            return 'NO';
        }
    }
}