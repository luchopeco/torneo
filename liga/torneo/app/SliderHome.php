<?php
namespace torneo;
use Illuminate\Database\Eloquent\Model;

class SliderHome extends Model{


    protected $table='slider_home';

    protected $fillable = ['titulo','imagen','mostrar'];

    protected $primaryKey = 'idslider_home';

    public function Activo()
    {
        if($this->mostrar ==1)
        {
            return 'SI';
        }
        else
        {
            return 'NO';
        }
    }

}