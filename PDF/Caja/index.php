<?php 

function get_Caja($Generales,$cmd,$iIdCaja) {   

  $Plantilla='<body>

    <div id="Logos">
     <img src="https://images.vexels.com/media/users/3/136264/isolated/preview/485f67bacd0d565a6d8732d3441059d9-icono-redondo-de-picadores-de-cocina-by-vexels.png" width="120" height="120">
    </div>

    <main>
      <h1 class="clearfix">CAJA N° '.$iIdCaja.'</h1>
      <table>
        <thead>
          <tr>
            <th class="service">N°</th>
            <th class="desc">FECHA - HORA</th>
            <th>CONCEPTO</th>
            <th>MONTO</th>
          </tr>
        </thead>
        <tbody>';
        $k=1;
        foreach ($cmd as $Detalles) {
         $Plantilla.= '<tr>
          <td class="service">'.$k.'</td>
          <td class="desc">'.$Detalles["Fecha"].'</td>
          <td class="unit">'.$Detalles["Descripcion"].'</td>';

          if ($Detalles['Descripcion']!="Venta") {
            $Plantilla.='<td class="total Roj">-$'.$Detalles["Total"].'</td></tr>';
          }
          else {
            $Plantilla.='<td class="total Ver">+$'.$Detalles["Total"].'</td></tr>';
          }
         $k++;
        }
        $Plantilla.='</tbody>
        <tr>
         <td colspan="3" class="sub">SUBTOTAL</td>
         <td class="sub total">$'.$Generales["fMontoTotal"].'</td>
        </tr>
        <tr>
         <td colspan="3" class="grand total">TOTAL</td>
         <td class="grand total">$'.$Generales["fMontoTotal"].'</td>
        </tr>
      </table>
      <div id="details" class="clearfix">
        <div id="project">
          <div class="arrow"><div class="inner-arrow"><span>USUARIO</span> '.$Generales["Usuario"].'</div></div>
          <div class="arrow"><div class="inner-arrow"><span>APERTURA</span> '.$Generales["dFechaApertura"].'</div></div>
          <div class="arrow"><div class="inner-arrow"><span>CIERRE</span> '.$Generales["dFechaCierre"].'</div></div>
          <div class="arrow"><div class="inner-arrow"><span>EMAIL</span> <a href="mailto:'.$Generales["sEmail"].'">'.$Generales["sEmail"].'</a></div></div>
        </div>
        <div id="company">
          <div class="arrow back"><div class="inner-arrow">RESTAURANTE MAWEY</div></div>
          <div class="arrow back"><div class="inner-arrow">Salta, Alvarado 1012, AR</div></div>
          <div class="arrow back"><div class="inner-arrow">+ 54 234 567 88</div></div>
          <div class="arrow back"><div class="inner-arrow"><a href="mailto:inforestautant@gmail.com">inforestaurant@gmail.com</a></div></div>
        </div>
      </div>
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

?>