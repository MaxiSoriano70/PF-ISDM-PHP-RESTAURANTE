<?php 

function get_Plantilla($Usuario,$FechaActual,$cmd,$transcode,$fTot) {   

 $Plantilla = '<body>
    <header class="clearfix">
      <div id="logo">
       <img src="https://images.vexels.com/media/users/3/136264/isolated/preview/485f67bacd0d565a6d8732d3441059d9-icono-redondo-de-picadores-de-cocina-by-vexels.png" width="70" height="70">
      </div>
      <div id="company">
        <h2 class="name">RESTAURANTE MAWEY</h2>
        <div>Salta, Alvarado 1012, AR</div>
        <div>+ 54 234 567 88</div>
        <div><a href="mailto:inforestautant@gmail.com">inforestaurant@gmail.com</a></div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">REALIZADO POR::</div>
          <h2 class="name">'.$Usuario["sNombre"].' '.$Usuario["sApellido"].'</h2>
          <div class="address">'.$Usuario["iContacto"].'</div>
          <div class="email"><a href=mailto:'.$Usuario["sEmail"].'>'.$Usuario["sEmail"].'</a></div>
        </div>
        <div id="invoice">
          <h1>REPORTE '.$transcode.'</h1>
          <div class="date">Fecha de Realizacion: '.$FechaActual.'</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">N°</th>
            <th class="desc">CLIENTE</th>
            <th class="unit">FECHA</th>
            <th class="qty">PLATILLOS</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tfoot>
         <tr>
          <td colspan="2"></td>
          <td colspan="2">SUBTOTAL</td>
          <td>$ '.$fTot['Total'].'</td>
         </tr>
         <tr>
          <td colspan="2"></td>
          <td colspan="2">TOTAL</td>
          <td>$ '.$fTot['Total'].'</td>
         </tr>
        </tfoot>
        <tbody>';
        $i=1;
        $tt=0;
        foreach ($cmd as $detalles) {
          $Plantilla .= '<tr>
            <td class="no">'.$i.'</td>
            <td class="desc">'.$detalles["sNombre"]." ".$detalles["sApellido"].'</td>
            <td class="unit">'.$detalles["dFecha"].'</td>
            <td class="qty">'.$detalles['iCantidad'].'</td>
            <td class="total">$ '.$detalles["fTotal"].'</td>
          </tr>';
          $i++;
        }

        $Plantilla.='</tbody>
      </table>
      <div id="thanks">Gracias!</div>
      <div id="notices">
        <div>IMPORTANTE</div>
        <div class="notice">Base Imponible al 21,00 % de IVA, cuota del 21,00% de IVA</div>
      </div>
    </main>
    <footer>
    © 2020 Copyright: RestauranteMawey.com
    </footer>
  </body>';

  return $Plantilla;
}
