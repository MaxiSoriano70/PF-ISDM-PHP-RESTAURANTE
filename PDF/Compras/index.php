<?php 

function get_Plantilla($compra,$detalle) {   

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
          <div class="to">COMPRADO A:</div>
          <h2 class="name">'.$compra["sNombre"].' '.$compra["sApellido"].'</h2>
          <div class="address">'.$compra["iTelefono"].'</div>
          <div class="email"><a href=mailto:'.$compra["sEmail"].'>'.$compra["sEmail"].'</a></div>
        </div>
        <div id="invoice">
          <h1>FACTURA N° '.$compra["iIdCompra"].'</h1>
          <div class="date">Fecha: '.$compra["dFecha"].'</div>
          <div class="date">Forma de Pago: '.$compra["sDescripcion"].'</div>
          <div>Número de Caja: '.$compra["iIdApertura"].'</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">N°</th>
            <th class="desc">INSUMO</th>
            <th class="unit">PRECIO</th>
            <th class="qty">CANTIDAD</th>
            <th class="total">SUBTOTAL</th>
          </tr>
        </thead>
        <tbody>';
        $i=1;
        $t=0;
        foreach ($detalle as $detalles) {
          $Plantilla .= '<tr>
            <td class="no">'.$i.'</td>
            <td class="desc">'.mb_strtoupper($detalles["sNombre"],'UTF-8').'</td>
            <td class="unit">$ '.$detalles["fPrecio"].'</td>
            <td class="qty">'.$detalles["iCantidad"].'</td>
            <td class="total">$ '.$detalles["fSubtotal"].'</td>
          </tr>';
          $i++;
          $t=$t+$detalles["fSubtotal"];
        }

        $Plantilla.='</tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>$ '.$t.'</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">TOTAL</td>
            <td>$ '.$t.'</td>
          </tr>
        </tfoot>
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
