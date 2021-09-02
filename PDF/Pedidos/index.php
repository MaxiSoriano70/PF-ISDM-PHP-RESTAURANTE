<?php 

function get_Plantilla($pedido,$detalle) {   

 $Plantilla = '<body>
    <header class="clearfix">
      <div id="logo">
        <img src="https://images.vexels.com/media/users/3/136264/isolated/preview/485f67bacd0d565a6d8732d3441059d9-icono-redondo-de-picadores-de-cocina-by-vexels.png" width="100" height="100">
      </div>
      <h1>PEDIDO N° '.$pedido["iIdPedido"].'</h1>
      <div id="company" class="clearfix">
        <div>RESTAURANTE MAWEY</div>
        <div>Salta, Alvarado 1012, AR</div>
        <div>+ 54 234 567 88</div>
        <div><a href="mailto:inforestautant@gmail.com">inforestautant@gmail.com</a></div>
      </div>
      <div id="project">
        <div><span>SOLICITADO A : </span></div>
        <div><span>PROVEEDOR </span>'.$pedido["sNombre"].' '.$pedido["sApellido"].'</div>
        <div><span>TELEFONO </span>'.$pedido["iTelefono"].'</div>
        <div><span>EMAIL </span><a href=mailto:'.$pedido["sEmail"].'>'.$pedido["sEmail"].'</a></div>
        <div><span>FECHA </span>'.$pedido["dFecha"].'</div>
        <div><span>ENTREGA </span>'.$pedido["dFecha_Entrega"].'</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th>N°</th>
            <th>INSUMO</th>
            <th>PRECIO</th>
            <th>CANTIDAD</th>
            <th>SUBTOTAL</th>
          </tr>
        </thead>
        <tbody>';
          $t=0;
          $i=1;
          foreach ($detalle as $detalles) {
            $Plantilla .= '<tr>
              <td class="unit">'.$i.'</td>
              <td class="unit">'.mb_strtoupper($detalles["sNombre"],'UTF-8').'</td>
              <td class="unit">$ '.$detalles["fPrecio"].'</td>
              <td class="qty">'.$detalles["iCantidad"].'</td>
              <td class="total">$ '.$detalles["fSubtotal"].'</td>
            </tr>';
            $i++;
            $t=$t+$detalles["fSubtotal"];
          }
          $Plantilla.='<tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">$ '.$t.'</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">TOTAL</td>
            <td class="grand total">$ '.$t.'</td>
          </tr>
        </tbody>
      </table>
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