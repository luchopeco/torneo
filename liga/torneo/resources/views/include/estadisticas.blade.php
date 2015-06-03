
 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div  class="fechas-wrapper col-fechas">
    <table class=" table table-hover">
       <tr >
           <th>EQUIPO</th>
           <th>PTS</th>
           <th>J</th>
           <th>G</th>
           <th>E</th>
           <th>P</th>
           <th>GF</th>
           <th>GC</th>
           <th>DIF</th>
       </tr>
       @foreach($torneo->TablaPosiciones() as $tabla)
           <tr >
               <td>{{$tabla->nombre_equipo}}</td>
               <td>{{$tabla->pun}}</td>
               <td>{{$tabla->pj}}</td>
               <td>{{$tabla->gan}}</td>
               <td>{{$tabla->emp}}</td>
               <td>{{$tabla->per}}</td>
               <td>{{$tabla->gf}}</td>
               <td>{{$tabla->gc}}</td>
               <td>{{$tabla->df}}</td>
           </tr>
       @endforeach
    </table>

    </div>
 </div>



