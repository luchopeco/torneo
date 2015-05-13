<?php
namespace torneo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Torneo extends Model{

    use SoftDeletes;

    protected $table='torneos';

    protected $fillable = ['nombre_torneo','observaciones_torneo','idtipo_torneo','fecha_baja'];

    protected $primaryKey = 'idtorneo';

    public function TipoTorneo()
    {
        return $this->hasOne('torneo\TipoTorneo', 'idtipo_torneo','idtipo_torneo');
    }
    public function ListEquipos()
    {
        return $this->belongsToMany('torneo\Equipo','torneo_equipo','torneo_idtorneo','equipo_idequipo')->orderBy('nombre_equipo');
    }
    public function ListFechas()
    {
        return $this->hasMany('torneo\Fecha','idtorneo','idtorneo')->orderBy('fecha')->orderBy('numero_fecha');
    }

    public function TablaPosiciones()
    {

        $tabla =  DB::select(DB::raw("SELECT sum(puntos) pun, sum(gf) gf, sum(gc) gc , sum(df) df, sum(pj) pj, id, nombre_equipo FROM
                            (
                            (SELECT sum(p.puntos_local) puntos, sum(p.goles_local) gf , sum(p.goles_visitante) gc,
                            sum(p.goles_local) - sum(p.goles_visitante) df , p.idequipo_local id , e.nombre_equipo, count(*) pj
                              FROM partidos p
                              INNER JOIN equipos e ON p.idequipo_local = e.idequipo
                            WHERE p.fue_jugado=1 AND p.idtorneo = :p1
                            GROUP BY p.idequipo_local)

                            UNION  all

                            (SELECT sum(p.puntos_visitante) puntos , sum(p.goles_visitante) gf, sum(p.goles_local) gc,
                            sum(p.goles_visitante) - sum(p.goles_local) df , p.idequipo_visitante id , e.nombre_equipo, count(*) pj
                              FROM partidos p
                              INNER JOIN equipos e ON p.idequipo_visitante = e.idequipo
                            WHERE p.fue_jugado=1 AND p.idtorneo = :p2
                            GROUP BY  p.idequipo_visitante)
                            ) AS tabla
                            GROUP BY id, nombre_equipo
                            ORDER BY pun desc, gf  DESC"), array(
                                            'p1' => $this->idtorneo,'p2' => $this->idtorneo));
        return $tabla;
    }

    //Propiedades Sin mapeo
    private  $activo;
    /**
     * @return Solo Lectura
     */
    public function Activo()
    {
        if($this->deleted_at ==null)
        {
            return 'SI';
        }
        else
        {
            return 'NO';
        }
    }


}