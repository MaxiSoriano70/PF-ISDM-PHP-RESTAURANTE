<?php 
 include "Libs/Header.php"; 
 include "Libs/MenuBuscar.php";
 include "Libs/MenuCategoria.php";
?> 

<?php 
 $update="UPDATE Visitas SET iCantidad=iCantidad+1 WHERE iIdVisita=1";
 $cmdup=preparar_query($Conexion,$update);
?>

<?php 

 if (!empty($_GET['Orden'])) {
  $Orden=$_GET['Orden'];
  if ($Orden=="Relevante") {
   $sql="select p.*,i.sNombreArchivo,sPath from platillos p inner join Platillo_Imagen pi on p.iIdPlatillo=pi.iIdPlatillo inner join Imagenes i on pi.iIdImagen=i.iIdImagen where pi.iOrden=1 and p.bEliminado=0 and i.bEliminado=0 and bMenu=0 ORDER BY p.sNombre;";
   $Platillos=preparar_select($Conexion,$sql);
  }
  else if ($Orden=="Mayor") {
   $sql="select p.*,i.sNombreArchivo,sPath from platillos p inner join Platillo_Imagen pi on p.iIdPlatillo=pi.iIdPlatillo inner join Imagenes i on pi.iIdImagen=i.iIdImagen where pi.iOrden=1 and p.bEliminado=0 and i.bEliminado=0 and bMenu=0 ORDER BY p.fPrecio DESC;";
   $Platillos=preparar_select($Conexion,$sql);
  }
  else {
   $sql="select p.*,i.sNombreArchivo,sPath from platillos p inner join Platillo_Imagen pi on p.iIdPlatillo=pi.iIdPlatillo inner join Imagenes i on pi.iIdImagen=i.iIdImagen where pi.iOrden=1 and p.bEliminado=0 and i.bEliminado=0 and bMenu=0 ORDER BY p.fPrecio;";
   $Platillos=preparar_select($Conexion,$sql);
  }    
 }
 
 
 
 else if (!empty($_GET['iIdCategoria'])) {
  $iIdCategoria=$_GET['iIdCategoria'];
  $sql="select p.*,i.sNombreArchivo,sPath from platillos p inner join Platillo_Imagen pi on p.iIdPlatillo=pi.iIdPlatillo inner join Imagenes i on pi.iIdImagen=i.iIdImagen inner join Platillo_Categoria pc on p.iIdPlatillo=pc.iIdPlatillo where pc.iIdCategoria=? and pi.iOrden=1 and p.bEliminado=0 and i.bEliminado=0 and bMenu=0;";
  $Platillos=preparar_select($Conexion,$sql,[$iIdCategoria]);
 }
 
 
 else {
  $sql="select p.*,i.sNombreArchivo,sPath from platillos p inner join Platillo_Imagen pi on p.iIdPlatillo=pi.iIdPlatillo inner join Imagenes i on pi.iIdImagen=i.iIdImagen where pi.iOrden=1 and p.bEliminado=0 and i.bEliminado=0 and bMenu=0;";
  $Platillos=preparar_select($Conexion,$sql);
 }
?>

<?php 
if (!empty($_POST['iIdPlatilloAñadido'])) { 

 if (!empty($_SESSION['iIdUsuario'])) {

 $Usuario=$_SESSION['iIdUsuario'];
 $iIdPlatilloAñadido=$_POST['iIdPlatilloAñadido'];

 $sp="select fPrecio from Platillos where iIdPlatillo=?";
 $cp=preparar_select($Conexion,$sp,[$iIdPlatilloAñadido]);
 $Pri=$cp->fetch_assoc();
 $Price=$Pri['fPrecio'];

 $Subtotal=(1*$Price);

 $sql="select count(*) as Total from carrito c where c.sEstado='En Curso' and c.iIdUsuario=?";
 $cmd=preparar_select($Conexion,$sql,[$Usuario]);
 $r=$cmd->fetch_assoc();

 if ($r['Total']==0) {
  $sqla="insert into carrito (iIdUsuario,dFecha,sEstado,fTotal) values (?,now(),'En Curso',0)";
  $cmda=preparar_query($Conexion,$sqla,[$Usuario]);
 }
 
 $sqlid="select iIdCarrito from carrito c where c.sEstado='En Curso' and c.iIdUsuario=?";
 $cmdid=preparar_select($Conexion,$sqlid,[$Usuario]);
 $rid=$cmdid->fetch_assoc();
 $iIdCarrito=$rid['iIdCarrito'];

 $scom="select iIdPlatillo,iCantidad,fSubtotal from detalle_carrito where iIdCarrito=?";
 $scom=preparar_select($Conexion,$scom,[$iIdCarrito]);

 $cont=0;
 foreach($scom as $Comparacion) {
  if ($Comparacion['iIdPlatillo']==$iIdPlatilloAñadido) {
   $sup="update detalle_carrito set iCantidad=?, fSubtotal=? where iIdPlatillo=?";
   $suma=(1+$Comparacion['iCantidad']);
   $Subt=($suma*$Price);
   $cup=preparar_select($Conexion,$sup,[$suma,$Subt,$iIdPlatilloAñadido]);
   $cont++;
  }
 }

 if ($cont==0) {
  $sqlinsert="insert into detalle_carrito (iIdPlatillo,iIdCarrito,iCantidad,fPrecio,fSubtotal) values (?,?,1,?,?)";
  $cmdinsert=preparar_query($Conexion,$sqlinsert,[$iIdPlatilloAñadido,$iIdCarrito,$Price,$Subtotal]);
 }

 $tt="select SUM(fSubtotal) AS Total from detalle_carrito where iIdCarrito=?";
 $ctt=preparar_select($Conexion,$tt,[$iIdCarrito]);
 $ftt=$ctt->fetch_assoc();

 $sqltot="Update carrito set fTotal=? where iIdCarrito=?";
 $ctot=preparar_select($Conexion,$sqltot,[$ftt['Total'],$iIdCarrito]);

 echo '<script>
  swal({
   title: "¡Agregado Correctamente!",
   text: "¡El Platilo se agregó a tu Carrito!",
   icon: "success",
   button: "Aceptar",
  })
  .then((value) => {
   switch (value) {
    default:
   }
  });
 </script>';
 }
 else {
  echo '<script>
   swal({
    title: "¡Agregado Incorrecto!",
    text: "¡Por Favor, Inicia Sesion o Crea una Cuenta!",
    icon: "warning",
    button: true,
    dangerMode: true,
   })
   .then((value) => {
    switch (value) {
     default:
      location.href ="/dbRestaurant/Acceso/Login.php"; 
     }
   });
  </script>';
 }
}
?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators" style="z-index:1">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active" data-interval="8000" touch>
      <img class="d-block w-100" src="Platillos/Fuentes/Iconos/a.jpg" alt="First slide" style="height:55%; object-fit: cover;">
      <div class="carousel-caption d-md-block" style="z-index:0">
       <h1>Tenemos Todo</h1>
       <p>Todo lo que Necesites para tu Hogar</p>
      </div>
    </div>
    <div class="carousel-item" data-interval="7000" touch>
      <img class="d-block w-100" src="Platillos/Fuentes/Iconos/b.jpg" alt="Second slide" style="height:55%; object-fit: cover;">
      <div class="carousel-caption d-md-block" style="z-index:0">
       <h1>Envio Gratis</h1>
       <p>Te lo llevamos a Tu Casa</p>
      </div>
    </div>
    <div class="carousel-item"  touch>
      <img class="d-block w-100" src="Platillos/Fuentes/Iconos/c.jpg" alt="Third slide" style="height:55%; object-fit: cover;">
      <div class="carousel-caption d-md-block" style="z-index:0">
       <h1>Formas de Pago</h1>
       <p>Aceptamos todo Tipo de Forma de Pago</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<?php 
  include 'Libs/Menus.php';
  include 'Libs/Ordenar.php';
?>

<?php 
 if (!empty($_GET['Palabra'])) {
  $Buscar=$_GET['Palabra'];
  $Aux="%".$Buscar."%";
 
  $sql="select p.*,i.sNombreArchivo,sPath from platillos p inner join Platillo_Imagen pi on p.iIdPlatillo=pi.iIdPlatillo inner join Imagenes i on pi.iIdImagen=i.iIdImagen where pi.iOrden=1 and p.bEliminado=0 and i.bEliminado=0 AND (p.sNombre LIKE ? OR p.sDescripcion LIKE ?)";
  $Platillos=preparar_select($Conexion,$sql,[$Aux,$Aux]);
 
  if ($Platillos->num_rows<=0) { ?>
  <style>.Body-Product {display:none !important;} </style>
  <?php echo "<div style='min-height: 30vh; text-align: center; margin-bottom: 10vh; width: 100%; display: flex; justify-content:center; align-items:center;'><span class='h2' style='vertical-align:text-bottom'>No se Encontraron Resultados para ' $Buscar '</span></div>";  
  }
 }
?>


<style><?php include 'css/Index.css' ?></style>

<button id="back-to-top-btn"><i class="fas fa-angle-double-up"></i></button>

<div class="Body-Product" id="scroll-test">
<?php foreach($Platillos as $Platillo) { ?>
 <a href="/dbRestaurant/Platillos/Individual.php?iIdIndividual=<?php echo $Platillo['iIdPlatillo'] ?>" class="Producto">
  <img src="Imagenes/<?php echo $Platillo["sNombreArchivo"];?>" alt="Auriculares">
  <div class="Informacion">
   <span class="Tipo-Envio">Envio con Normaildad</span>
   <span class="Precio">$ <?php echo $Platillo["fPrecio"] ?></span>
   <span class="Precio-Envio"><b>Envio Gratis</b></span>
   <span class="Descripcion"><?php echo $Platillo["sDescripcion"] ?></span>
   <div class="Calificacion">
    <span>
     <?php 
     $cant=$Platillo['iCal_Total'];
     $estr=5-$cant;
     for ($i=0; $i<$cant; $i++) { ?>
      <i class="fas fa-star Iconok"></i>
     <?php } ?>
     <?php for ($i=0; $i<$estr; $i++) { ?>
      <i class="fas fa-star Iconnook"></i>
     <?php } ?>
    </span>
    <span></span>
   </div>
   <span class="Ubicacion"><?php echo $Platillo["sNombre"] ?></span>
   <form class="Añadir-Carrito" name="Añadir" method="POST" action="Index.php">
    <input type="hidden" name="iIdPlatilloAñadido" value="<?php echo $Platillo['iIdPlatillo']; ?>">
    <?php if ($Platillo["iStock"]==0)
    { ?>
    <button type="Submit" class="btn btn-secondary bs" disabled>Sin Stock</button>
    	<?php } else {?>
    <button type="Submit" class="btn btn-primary bs">Agregar al Carrito</button>
    	<?php } ?>
   </form>
  </div>
  
 </a>
<?php } ?>
</div>


<div class="Cont-Info">
 <div class="Cont-Gr animado">
  <div class="InfiZ">
   <div class="cons">
    <h1 class="Titinf">TRABAJAMOS PARA VOS</h1>
    <p class="Parrinf">
     Trabajamos constantemente y con muchas ganas para que Nuestra Empresa crezca cada día mucho más. En este momento se logró realizar este sitio web para una interacción sin tener que salir de su casa.
    </p>
    <a href="/dbRestaurant/Informacion/" class="Btninfo btn btn-outline-primary">Conócenos</a>
   </div>
  </div>
  <div class="Infder">
   <img src="https://www.beservices.es/images/beservices-servicios-ti-empresas.jpg" alt="Imagen" class="iminfo">
  </div>
 </div>
</div>


<?php include "Libs/Footer.php"; ?> 
<script><?php include 'js/Index.js'; ?></script> 