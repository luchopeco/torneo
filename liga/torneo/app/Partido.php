<?php
namespace torneo;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model{


    protected $table='partidos';

    protected $fillable = ['idpartido','idfecha','idequipo_local','idequipo_visitante','goles_local',
        'goles_visitante','hora','idarbitro','idtorneo',];

    protected $primaryKey = 'idpartido';

    public function Torneo()
    {
        return $this->hasOne('torneo\Torneo', 'idtorneo','idtorneo');
    }

    public function EquipoLocal()
    {
        return $this->hasOne('torneo\Equipo', 'idequipo','idequipo_local');
    }
    public function EquipoVisitante()
    {
        return $this->hasOne('torneo\Equipo', 'idequipo','idequipo_visitante');
    }
    public function Arbitro()
    {
        return $this->hasOne('torneo\Arbitro', 'idarbitro','idarbitro');
    }
}