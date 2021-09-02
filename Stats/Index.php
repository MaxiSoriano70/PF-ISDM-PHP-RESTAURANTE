<?php include '../libs/Header.php'; ?>

<?php 
 if (empty($_SESSION['iIdUsuario'])) {
  echo '<script>
   location.href ="/dbRestaurant/Acceso/Not-Found.php/"; 
  </script>';
 }
 else {
  $Usur=$_SESSION['iIdUsuario'];
  $sql="select sNombre from Permisos where iIdPermiso=(select iIdPermiso from Usuarios where iIdUsuario=?)";
  $cmd=preparar_select($Conexion,$sql,[$Usur]);
  $res=$cmd->fetch_assoc();

  if ($res['sNombre']!="Gerente") {
   echo '<script>
    location.href ="/dbRestaurant/Acceso/Not-Found.php/"; 
   </script>';
  }  
 }
?>

<?php 
 //Panel de Control 
 $sqlclientes="SELECT COUNT(iIdUsuario) AS Clientes FROM usuarios WHERE iIdPermiso=(SELECT iIdPermiso FROM permisos WHERE sNombre='Cliente')";
 $cmdclientes=preparar_select($Conexion,$sqlclientes);
 $rclientes=$cmdclientes->fetch_assoc();

 $sqlempleados="SELECT COUNT(iIdUsuario) AS Empleados FROM usuarios WHERE iIdPermiso!=(SELECT iIdPermiso FROM permisos WHERE sNombre='Cliente')";
 $cmdempleados=preparar_select($Conexion,$sqlempleados);
 $rempleados=$cmdempleados->fetch_assoc();

 $sqlproveedores="SELECT COUNT(iIdProveedor) AS Proveedores FROM proveedores";
 $cmdproveedores=preparar_select($Conexion,$sqlproveedores);
 $rproveedores=$cmdproveedores->fetch_assoc();

 $sqlplatillos="SELECT COUNT(iIdPlatillo) AS Platillos FROM platillos WHERE bEliminado=0";
 $cmdplatillos=preparar_select($Conexion,$sqlplatillos);
 $rplatillos=$cmdplatillos->fetch_assoc();

 $sqlmenus="SELECT COUNT(iIdMenu) AS Menus FROM menus";
 $cmdmenus=preparar_select($Conexion,$sqlmenus);
 $rmenus=$cmdmenus->fetch_assoc();
?>

<?php 
 //Visitas 
 $sqlds="SELECT SUM(iCantidad) as Tot_Visit FROM visitas";
 $cmdds=preparar_select($Conexion,$sqlds);
 $pds=$cmdds->fetch_assoc();
?>

<?php
 // Consultas de Ventas  
 $Año="2020%";
 $sql="SELECT COUNT(iIdVenta) AS cVentas, SUM(fTotal) AS Facturacion FROM VENTAS WHERE dFecha LIKE ?";
 $cmd=preparar_select($Conexion,$sql,[$Año]);
 $Datos=$cmd->fetch_assoc();

 $sqlsel="SELECT YEAR(dFecha) AS Years FROM ventas GROUP BY YEAR(dFecha) DESC";
 $cmdsel=preparar_select($Conexion,$sqlsel);

 $sqlmax="SELECT MAX(YEAR(dFecha)) AS Maximo FROM ventas";
 $cmdmax=preparar_select($Conexion,$sqlmax);
 $rmax=$cmdmax->fetch_assoc();
 $Maximo=$rmax['Maximo'];


 // Consultas de Compras 
 $Añoc="2020%";
 $sqlc="SELECT COUNT(iIdCompra) AS cCompras, SUM(fTotal) AS Facturacionc FROM COMPRAS WHERE dFecha LIKE ?";
 $cmdc=preparar_select($Conexion,$sqlc,[$Añoc]);
 $Datosc=$cmdc->fetch_assoc();

 $sqlfc="SELECT YEAR(dFecha) AS Yearsc FROM compras GROUP BY YEAR(dFecha) DESC";
 $cmdfc=preparar_select($Conexion,$sqlfc);

 $sqlmaxc="SELECT MAX(YEAR(dFecha)) AS Maximoc FROM compras";
 $cmdmaxc=preparar_select($Conexion,$sqlmaxc);
 $rmaxc=$cmdmaxc->fetch_assoc();
 $Maximoc=$rmaxc['Maximoc'];


 // Consultas Fechas Productos mas Vendidos 
 $sqlfmi="SELECT DATE_FORMAT(dFecha,'%Y-%m') as Vendido_Min FROM ventas WHERE dFecha = (SELECT MIN(dFecha) FROM ventas)";
 $cmdfmi=preparar_select($Conexion,$sqlfmi);
 $rfmi=$cmdfmi->fetch_assoc();
 $Vendido_Min=$rfmi['Vendido_Min'];
 
 $sqlfma="SELECT DATE_FORMAT(dFecha,'%Y-%m') as Vendido_Max FROM ventas WHERE dFecha = (SELECT MAX(dFecha) FROM ventas)";
 $cmdfma=preparar_select($Conexion,$sqlfma);
 $rfma=$cmdfma->fetch_assoc();
 $Vendido_Max=$rfma['Vendido_Max'];

 $slqrec="SELECT DATE_FORMAT(dFecha,'%Y-%m') as Fechas FROM ventas GROUP BY EXTRACT(YEAR_MONTH FROM dFecha) DESC";
 $cmdrec=preparar_select($Conexion,$slqrec);

?>

<style><?php include 'css/Index.css';?></style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="/dbRestaurant/"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Estadisticas</h1>
 </div>
 <div class="boxin">
  <div></div>
  <div></div>
  <div></div>
  <div></div>
  <div></div>
  <div></div>
 </div>
</div>


<!-- --------------------------------------------------------------------------------------------------------------- -->

<div class="Title-Dash">Panel de Control</div>

<div class="Cont-Dashboard">

 <div class="Dashboard" id="Clientes">
  <div class="Arribd" id="ArribCliente">
   <div class="Izqd">
    <div class="Contd-aux">
     <div class="Cantid"><?php echo $rclientes['Clientes'] ?></div>
     <div class="Descd">Clientes</div>
    </div>
   </div>
   <div class="Derd"><i class="ics fas fa-users"></i></div>
  </div>
  <a href="/dbRestaurant/Usuarios/Clientes/" class="Abajd" id="AbajCliente">Ver Más</a>
 </div>

 <div class="Dashboard" id="Empleados">
  <div class="Arribd" id="ArribEmpleado">
   <div class="Izqd">
    <div class="Contd-aux">
     <div class="Cantid"><?php echo $rempleados['Empleados'] ?></div>
     <div class="Descd">Empleados</div>
    </div>
   </div>
   <div class="Derd"><i class="ics fas fa-user-tag"></i></div>
  </div>
  <a href="/dbRestaurant/Usuarios/Empleados/" class="Abajd" id="AbajEmpleado">Ver Más</a>
 </div>

 <div class="Dashboard" id="Proveedores">
  <div class="Arribd" id="ArribProveedor">
   <div class="Izqd">
    <div class="Contd-aux">
     <div class="Cantid"><?php echo $rproveedores['Proveedores'] ?></div>
     <div class="Descd">Proveedores</div>
    </div>
   </div>
   <div class="Derd"><i class="ics fas fa-user-tie"></i></div>
  </div>
  <a href="/dbRestaurant/Proveedores/" class="Abajd" id="AbajProveedor">Ver Más</a>
 </div>

 <div class="Dashboard" id="Platillos">
  <div class="Arribd" id="ArribPlatillo">
   <div class="Izqd">
    <div class="Contd-aux">
     <div class="Cantid"><?php echo $rplatillos['Platillos'] ?></div>
     <div class="Descd">Platillos</div>
    </div>
   </div>
   <div class="Derd"><i class="ics fas fa-utensils"></i></div>
  </div>
  <a href="/dbRestaurant/Platillos/" class="Abajd" id="AbajPlatillo">Ver Más</a>
 </div>

 <div class="Dashboard" id="Menus">
  <div class="Arribd" id="ArribMenu">
   <div class="Izqd">
    <div class="Contd-aux">
     <div class="Cantid"><?php echo $rmenus['Menus'] ?></div>
     <div class="Descd">Menús</div>
    </div>
   </div>
   <div class="Derd"><i class="ics fas fa-fish"></i></div>
  </div>
  <a href="/dbRestaurant/Menus/" class="Abajd" id="AbajMenu">Ver Más</a>
 </div>

</div>

<!-- --------------------------------------------------------------------------------------------------------------- -->

<div class="Prin">Datos Globales de tu Tienda</div>
<div class="Sec">Ventas</div>
<input type="hidden" id="Maxim" value="<?php echo $Maximo; ?>">

<div class="Botones">
 <select name="Año" class="sop al" id="vals" onchange="Graficosa(this.value,'MyChartb','Ventas','bar');">
  <?php foreach ($cmdsel as $Years) { ?>
  <option value="<?php echo $Years['Years']; ?>" class="Opciones"><?php echo $Years['Years']; ?></option>
  <?php } ?> 
 </select>
 <a href="" id="gb" class="Bs al">Barra</a>
 <a href="" id="gt" class="Bs al">Torta</a>
 <a href="" id="gl" class="Bs al">Lineal</a>
</div>

<div class="Cont-Gral">

 <div class="Contenido">
  <div class="mc d-block">
  <?php $vectoraux=array(); $k=0;?>
  <?php foreach ($cmdsel as $Years) { ?>
   <canvas id="MyChartb<?php echo $Years['Years']?>" class="chs"></canvas>
   <canvas id="MyChartt<?php echo $Years['Years']?>" class="chs"></canvas>
   <canvas id="MyChartl<?php echo $Years['Years']?>" class="chs"></canvas>
   <?php $vectoraux[$k]=$Years['Years']; $k++; ?>
  <?php } ?>
  </div>

  <div class="Stats">
   <div class="Conaux">
    <div class="Cntst">
     <div class="Izq-st"> <span class="icav"><i class="fas fa-users"></i></span> <span class="mtxt">Visitas Unicas</span></div>
     <div class="Der-st"><span class="mtr" id="visven"><?php echo $pds['Tot_Visit']; ?></span></div>
    </div>
    <div class="Cntst">
     <div class="Izq-st"> <span class="icav"><i class="fas fa-shopping-cart"></i></span> <span class="mtxt">Total de Ventas</span></div>
     <div class="Der-st"><span class="mtr" id="cVentas"><?php echo $Datos['cVentas']; ?></span></div>
    </div>
    <div class="Cntst">
     <div class="Izq-st"> <span class="icav"><i class="fas fa-dollar-sign"></i></span> <span class="mtxt">Facturación</span></div>
     <div class="Der-st"><span class="mtr" id="Facturacion">$ <?php echo $Datos['Facturacion']; ?></span></div>
    </div>
    <div class="Cntst">
     <div class="Izq-st"> <span class="icav"><i class="fas fa-users"></i></span> <span class="mtxt">Visitas Unicas</span></div>
     <div class="Der-st"><span class="mtr">8578</span></div>
    </div>
   </div>
  </div>
 </div>
</div>


<!-- --------------------------------------------------------------------------------------------------------------- -->

<div class="Cont-Banner">
 <div class="Cont-Aux">
  <div class="Banner-Izq">
   <img src="img/compus.svg" alt="" class="Banner-Im">
  </div>
  <div class="Banner-Der">
  <div class="Texto">
   <h3 class="Titulo">Las Estadisticas</h3>
   <p class="Parrafo">Las Estadisticas se se encargan de estudiar las características de una muestra representativa de datos, buscando obtener la mayor cantidad posible de información a través de la utilización de herramientas de cálculo y análisis.</p>
  </div>
  </div>
 </div>
</div>

<!-- --------------------------------------------------------------------------------------------------------------- -->


<br><br><br>
<div class="Prin">Datos Globales de tu Tienda</div>
<div class="Sec">Compras</div>
<input type="hidden" id="Maximc" value="<?php echo $Maximoc; ?>">

<div class="Botones">
 <select name="Añoc" class="form-control sop al" id="valsc" onchange="Graficosac(this.value,'MyChartbc','Compras','bar');">
  <?php foreach ($cmdfc as $Yearsc) { ?>
  <option value="<?php echo $Yearsc['Yearsc']; ?>" class="Opciones"><?php echo $Yearsc['Yearsc']; ?></option>
  <?php } ?>
 </select>
 <a href="" id="gbc" class="Bs al">Barra</a>
 <a href="" id="gtc" class="Bs al">Torta</a>
 <a href="" id="glc" class="Bs al">Lineal</a>
</div>

<div class="Cont-Gral">

 <div class="Contenido">
  <div class="mc d-block">
  <?php $vectorauxc=array(); $kc=0;?>
  <?php foreach ($cmdfc as $Yearsc) { ?>
   <canvas id="MyChartbc<?php echo $Yearsc['Yearsc']?>" class="chs"></canvas>
   <canvas id="MyCharttc<?php echo $Yearsc['Yearsc']?>" class="chs"></canvas>
   <canvas id="MyChartlc<?php echo $Yearsc['Yearsc']?>" class="chs"></canvas>
   <?php $vectorauxc[$kc]=$Yearsc['Yearsc']; $kc++; ?>
  <?php } ?>
  </div>

  <div class="Stats">
   <div class="Conaux">
    <div class="Cntst">
     <div class="Izq-st"> <span class="icav"><i class="fas fa-users"></i></span> <span class="mtxt">Visitas Unicas</span></div>
     <div class="Der-st"><span class="mtr" id="viscom"><?php echo $pds['Tot_Visit']; ?></span></div>
    </div>
    <div class="Cntst">
     <div class="Izq-st"> <span class="icav"><i class="fas fa-shopping-cart"></i></span> <span class="mtxt">Total de Compras</span></div>
     <div class="Der-st"><span class="mtr" id="cCompras"><?php echo $Datosc['cCompras']; ?></span></div>
    </div>
    <div class="Cntst">
     <div class="Izq-st"> <span class="icav"><i class="fas fa-dollar-sign"></i></span> <span class="mtxt">Facturación</span></div>
     <div class="Der-st"><span class="mtr" id="Facturacionc">$ <?php echo $Datosc['Facturacionc']; ?></span></div>
    </div>
    <div class="Cntst">
     <div class="Izq-st"> <span class="icav"><i class="fas fa-users"></i></span> <span class="mtxt">Visitas Unicas</span></div>
     <div class="Der-st"><span class="mtr" id=" ">8578</span></div>
    </div>
   </div>
  </div>
 </div>
</div>


<!-- --------------------------------------------------------------------------------------------------------------- -->

<div class="Cont-Bann">
 <div class="Contn-Izq">
  <div class="Tex">
   <h3 class="Tit">Productos mas y Menos Vendidos</h3>
   <p class="Parr">Para que no te equivoques a la hora de elegir el sector y el público de tu tienda online, aquí te mostramos los 6 productos que más se venden a través de tu Página. En el caso de los más vendidos la demanda está asegurada, aunque la competencia también. En caso de los Menos Vendidos busca la manera de Aumentar su numero de Ventas.</p>
  </div>
 </div>
 <div class="Contn-Der">
  <img src="img/Productos.svg" alt="" class="Im-Banner">
 </div>
</div>

<!-- --------------------------------------------------------------------------------------------------------------- -->

<br><br><br>
<div class="Prin">Datos Globales de tu Tienda</div>
<div class="Sec">Productos mas y menos vendidos</div>

<div class="Cont-Produc">

 <div class="Graf-Izq">
  <div class="Botones-Cont">
   <div class="Inputc">
    <div class="Antes"><i class="fas fa-calendar-alt"></i></div>
    <input type="month" id="In1" class="infec" min="<?php echo $Vendido_Min; ?>" max="<?php echo $Vendido_Max; ?>" value="<?php echo $Vendido_Max; ?>" onchange="Graficospv(this.value,'MyChartpv','Pv','doughnut','Productos mas Vendidos');">
   </div>
  </div>
  <div class="Contenidob">
   <div class="d-block">
   <?php $vectorpv=array(); $cp=0;?>
   <?php foreach ($cmdrec as $Fechas) { ?>
    <canvas id="MyChartpv<?php echo $Fechas['Fechas']?>" class="chsa"></canvas>
    <?php $vectorpv[$cp]=$Fechas['Fechas']; $cp++; ?>
   <?php } ?>
   </div>
  </div>
 </div>

 <div class="Graf-Der">
  <div class="Botones-Cont">
   <div class="Inputc">
    <div class="Antes"><i class="fas fa-calendar-alt"></i></div>
    <input type="month" id="In2" class="infec" min="<?php echo $Vendido_Min; ?>" max="<?php echo $Vendido_Max; ?>" value="<?php echo $Vendido_Max; ?>" onchange="Graficospnv(this.value,'MyChartpnv','Pnv','doughnut','Productos menos Vendidos');">
   </div>
  </div>
  <div class="Contenidob">
   <div class="d-block">
   <?php $vectorpnv=array(); $cnp=0;?>
   <?php foreach ($cmdrec as $Fechasb) { ?>
    <canvas id="MyChartpnv<?php echo $Fechasb['Fechas']?>" class="chsa"></canvas>
    <?php $vectorpnv[$cnp]=$Fechasb['Fechas']; $cnp++; ?>
   <?php } ?>
   </div>
  </div>
 </div>

</div>

<br><br><br>

<?php include '../libs/Footer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script><?php include 'js/Index.js'?></script>




