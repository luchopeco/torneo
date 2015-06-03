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

        $tabla =  DB::select(DB::raw("SELECT sum(emp) emp,sum(gan) gan,sum(per) per, sum(puntos) pun, sum(gf) gf, sum(gc) gc , sum(df) df, sum(pj) pj, id, nombre_equipo FROM
                            (
                            (SELECT sum(p.empatado_local) emp ,sum(p.ganado_local) gan,sum(p.perdido_local) per , sum(p.puntos_local) puntos, sum(p.goles_local) gf , sum(p.goles_visitante) gc,
                            sum(p.goles_local) - sum(p.goles_visitante) df , p.idequipo_local id , e.nombre_equipo, count(*) pj
                              FROM partidos p
                              INNER JOIN equipos e ON p.idequipo_local = e.idequipo
                              INNER JOIN fechas f ON f.idfecha = p.idfecha
                            WHERE p.fue_jugado=1 AND p.idtorneo = :p1
                            AND f.es_play_off =0
                            GROUP BY p.idequipo_local)

                            UNION  all

                            (SELECT sum(p.empatado_visitante) emp,sum(p.ganado_visitante) gan,sum(p.perdido_visitante) per , sum(p.puntos_visitante) puntos , sum(p.goles_visitante) gf, sum(p.goles_local) gc,
                            sum(p.goles_visitante) - sum(p.goles_local) df , p.idequipo_visitante id , e.nombre_equipo, count(*) pj
                              FROM partidos p
                              INNER JOIN equipos e ON p.idequipo_visitante = e.idequipo
                              INNER JOIN fechas f ON f.idfecha = p.idfecha
                            WHERE p.fue_jugado=1 AND p.idtorneo = :p2
                            AND f.es_play_off=0
                            GROUP BY  p.idequipo_visitante)
                            ) AS tabla
                            GROUP BY id, nombre_equipo
                            ORDER BY pun desc, gf  DESC"), array(
                                            'p1' => $this->idtorneo,'p2' => $this->idtorneo));
        return $tabla;
    }

    public function Goleadores(){
        $goleadores =  DB::select(DB::raw("SELECT sum(phj.goles_favor) goles,j.nombre_jugador, e.nombre_equipo
                              FROM partido_has_jugador phj
                            INNER JOIN jugadores j ON j.idjugador = phj.idjugador
                            INNER JOIN partidos p ON p.idpartido = phj.idpartido
                            INNER JOIN fechas f ON f.idfecha = p.idfecha
                            INNER JOIN equipos e ON e.idequipo = j.idequipo
                            WHERE f.idtorneo= :p1
                            GROUP BY j.nombre_jugador, e.nombre_equipo
                            ORDER BY goles DESC"), array(
                            'p1' => $this->idtorneo));
        return $goleadores;

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