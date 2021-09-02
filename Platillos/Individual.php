<?php
  include "../Libs/Header.php";
  include "../Libs/MenuBuscar.php";
  include "../Libs/MenuCategoria.php";
?>  

<?php 
 $update="UPDATE Visitas SET iCantidad=iCantidad+1 WHERE iIdVisita=2";
 $cmdup=preparar_query($Conexion,$update);
?>

<?php
  if (!empty($_GET["iIdIndividual"])) {
   $iId=$_GET["iIdIndividual"];
   $sql="SELECT p.sNombre, p.sDescripcion,p.fPrecio,p.iStock,p.iCal_Total FROM Platillos p where p.iIdPlatillo=?";
   $individuales=preparar_select($Conexion,$sql,[$iId]);
   $Platillo=$individuales->fetch_assoc();

   $sqlvnt="SELECT SUM(iCantidad) AS NumVentas FROM Detalle_Venta dv INNER JOIN ventas v ON v.iIdVenta=dv.iIdVenta WHERE iIdPlatillo=? AND v.sEstado='Concretado'";
   $cmdvnt=preparar_select($Conexion,$sqlvnt,[$iId]);
   $vtas=$cmdvnt->fetch_assoc();
   if (!empty($vtas['NumVentas'])) { $Ventas=$vtas['NumVentas']; }
   else { $Ventas='0'; }

   $im="select i.sNombreArchivo,i.sPath from Platillo_Imagen pi left join Imagenes i on pi.iIdImagen=i.iIdImagen where i.bEliminado=0 and iIdPlatillo=?";
   $vim=preparar_select($Conexion,$im,[$iId]);

   $qinsumos="select i.sNombre from insumos i inner join insumo_platillo ip on i.iIdInsumo=ip.iIdInsumo where ip.iIdPlatillo=?";
   $cinsumos=preparar_select($Conexion,$qinsumos,[$iId]);

   $qcat="select c.iIdCategoria,c.sNombre from categorias c inner join platillo_categoria pc on c.iIdCategoria=pc.iIdCategoria where pc.iIdPlatillo=?";
   $ccat=preparar_select($Conexion,$qcat,[$iId]);
  
   $sComent="SELECT U.sLogin,u.sPerfil,c.iIdPlatillo,sTitulo,sTexto,iCalificacion,dFecha FROM Comentarios c INNER JOIN Usuarios u ON u.iIdUsuario=c.iIdUsuario WHERE iIdPlatillo=? ORDER BY dFecha DESC";
   $cComent=preparar_select($Conexion,$sComent,[$iId]);

   $ksqlc="SELECT COUNT(iIdPlatillo) as Comentarios FROM comentarios WHERE iIdPlatillo=?";
   $ccom=preparar_select($Conexion,$ksqlc,[$iId]);
   $kComents=$ccom->fetch_assoc();
  }
?>


<?php 
if (!empty($_POST['iIdPlatilloAñadido'])) { 

 if (!empty($_SESSION['iIdUsuario'])) {

 $Usuario=$_SESSION['iIdUsuario'];
 $iIdPlatilloAñadido=$_POST['iIdPlatilloAñadido'];
 $Quantity=$_POST['iCantidad'];

 $sp="select fPrecio from Platillos where iIdPlatillo=?";
 $cp=preparar_select($Conexion,$sp,[$iIdPlatilloAñadido]);
 $Pri=$cp->fetch_assoc();
 $Price=$Pri['fPrecio'];

 $Subtotal=($Quantity*$Price);

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
   $suma=($Quantity+$Comparacion['iCantidad']);
   $Subt=($suma*$Price);
   $cup=preparar_select($Conexion,$sup,[$suma,$Subt,$iIdPlatilloAñadido]);
   $cont++;
  }
 }

 if ($cont==0) {
  $sqlinsert="insert into detalle_carrito (iIdPlatillo,iIdCarrito,iCantidad,fPrecio,fSubtotal) values (?,?,?,?,?)";
  $cmdinsert=preparar_query($Conexion,$sqlinsert,[$iIdPlatilloAñadido,$iIdCarrito,$Quantity,$Price,$Subtotal]);
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

<style><?php include 'css/Individual.css'?></style>

<button id="back-to-top-btn"><i class="fas fa-angle-double-up"></i></button>



<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="/dbRestaurant/"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Platillos</h1>
 </div>
</div>


<div class="Cont-Gral">
 <div class="Card-Pl">

  <div class="Card-Izq">
   <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
     <?php $contador = 0; foreach ($vim as $img) {?>
     <div class="carousel-item <?php echo $contador == 0 ? "active" : "";?>">
      <img src="../Imagenes/<?php echo $img['sNombreArchivo']?>" class="d-block imd" style="border-radius:15px;" width="100%" height="850px">
     </div>
     <?php $contador++; } $contador; ?>
    </div>
    <a class="carousel-control-prev btns" href="#carouselExampleControls" role="button" data-slide="prev" style="z-index:0">
     <i class="fas fa-arrow-alt-circle-left"></i>
     <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next btns" href="#carouselExampleControls" role="button" data-slide="next" style="z-index:0">
     <i class="fas fa-arrow-alt-circle-right"></i>
     <span class="sr-only">Next</span>
    </a>
   </div> 
  </div>

  <div class="Card-Der">
   <div class="Header">
    <div id="Ventas" class="ContentHeader mr-3"><?php echo $Ventas ?> Ventas</div>
    <?php if ($ccat->num_rows>0) { ?>
    <div id="Categoria" class="ContentHeader">Categoría
    <?php foreach($ccat as $rcat) { ?> 
     <a id="hov" href="../Index.php?iIdCategoria=<?php echo $rcat['iIdCategoria']?>"><?php echo $rcat['sNombre']?></a>
    <?php } ?>
    </div>
    <?php } else { ?>
    <div id="Categoria" class="ContentHeader ml-1">Categoría<a class="pl-1" id="hov"><b>Ninguna</b></a></div>
    <?php } ?>
   </div>
    <h2 id="Titulo"><?php echo $Platillo['sNombre']; ?></h2>
    <div id="Descripcion"><?php echo $Platillo['sDescripcion']; ?> . Cocinamos tu comida, sin conservantes ni aditivos, deliciosos, equilibrados y saludables, en una sola entrega. Preparamos tus platos de forma tradicional, aplicando técnicas de alta cocina, cuando están casi terminados, los enfriamos muy rápido y los envasamos al vacío, de esta manera no se necesita añadir conservantes y tus platos pueden tener una durabilidad de hasta 6 días (siempre refrigerados).</div>
    <div id="Precio">$ <?php echo $Platillo['fPrecio']; ?></div>
    <div id="Punt">
     <span>
     <?php 
     $cant=$Platillo['iCal_Total'];
     $estr=5-$cant;
     for ($i=0; $i<$cant; $i++) { ?>
      <i class="fas fa-star Iconokax"></i>
     <?php } ?>
     <?php for ($i=0; $i<$estr; $i++) { ?>
      <i class="fas fa-star Iconnookax"></i>
     <?php } ?>
     </span>
    </div>
    <div id="Cartel">
     <div class="becn"><b>Envío con Normalidad</b></div>
    </div>
    <div id="Insumos">
     <h5 id="InsumoTitle">Insumos</h5>
     <div id="ContentListInsumo">
      <ul id="Lista">
       <?php foreach ($cinsumos as $Insumos) { 
        echo "<li>" . $Insumos['sNombre'] . "</li>";
       } ?>
      </ul>
     </div>
    </div>
    <div id="Envio">
     <div id="Arriba">
      <div><i class="fas fa-motorcycle mr-2"></i>Envio Seguro y Rapido<span class="font-italic"><i class="fas fa-bolt ml-1 mr-1"></i>Full</span></div>
     </div>
     <div id="Abajo">
      <span>Conocé los tiempos y las formas de Envío</span>
     </div>
    </div>
    <form class="Añadir-Carrito" method="POST" action="Individual.php?iIdIndividual=<?php echo $iId?>">
     <input type="hidden" name="iIdPlatilloAñadido" value="<?php echo $iId ?>">
     <input type="hidden" id="iStock" name="iStock" value="<?php echo $Platillo['iStock'] ?>">
     <div id="Cantidad">
      <div id="CantidadTitle">
      <?php $cant=$Platillo['iStock']; 
       if ($cant==0) { 
        echo 'No Disponible'; 
       }
       else if ($cant==1) {
        echo ' Disponible '.$Platillo['iStock'];
       }
       else {
        echo ' Disponibles '.$Platillo['iStock'];
       }
      ?>  
      </div>

      <?php if ($Platillo["iStock"]==0) {?>
      <div id="Input">
       <div id="brs" class="input-group ml-auto mr-auto">
        <div class="input-group-prepend">
         <button class="btn btn-outline-primary js-btn-minus" type="button" disabled>&minus;</button>
        </div>
        <input type="number" name="iCantidad" id="InputCant" class="form-control text-center" value="1" min="1" placeholder="1" aria-label="Example text with button addon" aria-describedby="button-addon1" max="<?php echo $Platillo['iStock']; ?>" disabled>
        <div class="input-group-append">
         <button class="btn btn-outline-primary js-btn-plus" type="button" disabled>&plus;</button>
        </div>
       </div>
      </div>
     </div>
     <div id="Boton">
      <button type="submit" class="btn btn-secondary text-white" disabled><b><i class="fas fa-shopping-cart mr-2"></i>Sin Stock</b></button>
     </div>
     <?php } else  { ?>
      <div id="Input">
       <div id="brs" class="input-group ml-auto mr-auto">
        <div class="input-group-prepend">
         <button class="btn btn-outline-primary js-btn-minus" type="button" onblur="Stock()">&minus;</button>
        </div>
        <input type="number" name="iCantidad" id="InputCant" class="form-control text-center" value="1" placeholder="1" onblur="Stock()">
        <div class="input-group-append">
         <button class="btn btn-outline-primary js-btn-plus" type="button" onblur="Stock()">&plus;</button>
        </div>
       </div>
      </div>
     </div>
     <div id="Boton">
      <button type="submit" class="btn btn-info text-white"><b><i class="fas fa-shopping-cart mr-2"></i>Añadir Al Carrito</b></button>
     </div>
    <?php } ?>
   </form>
    
  </div>

 </div>
</div>


<div class="Cont-Coments">
 <div class="Com-Arriba">
  <p class="Opiniones"><b class="ml-2 w-100">Opiniones o Reseñas (<?php echo $kComents['Comentarios']?>)</b></p>
 </div>
 <div class="Com-Abajo">
  <?php if (empty($_SESSION['iIdUsuario'])) {
   $UsoS=0;   
  } else {
   $UsoS=$_SESSION['iIdUsuario'];
  } ?> 
  <input type="hidden" id="UsOc" value="<?php echo $UsoS ?>">
  <form name="Opinions" id="formPuntuacion"method="POST" action="../Comentarios/Create.php">
   <input type="hidden" name="iIdPlatillo" value="<?php echo $iId; ?>">
   <div class="Com-Escribir">
    <div class="Estrellas">
     <p class="Clasificacion">
      <i class="ml-3 ie fas fa-exclamation-circle"></i>
      <input id="radio1" type="radio" name="estrellas" value="5">
      <label for="radio1"><i class="fas fa-star" onclick="Puntuacion(5);"></i></label>
      <input id="radio2" type="radio" name="estrellas" value="4">
      <label for="radio2"><i class="fas fa-star" onclick="Puntuacion(4);"></i></label>
      <input id="radio3" type="radio" name="estrellas" value="3">
      <label for="radio3"><i class="fas fa-star" onclick="Puntuacion(3);"></i></label>
      <input id="radio4" type="radio" name="estrellas" value="2">
      <label for="radio4"><i class="fas fa-star" onclick="Puntuacion(2);"></i></label>
      <input id="radio5" type="radio" name="estrellas" value="1">
      <label for="radio5"><i class="fas fa-star" onclick="Puntuacion(1);"></i></label>
     </p>
     <input type="hidden" name="iPuntuacion" id="Estrellas">
    </div>
    <div class="input-div one">
     <div class="i">
      <i class="fas fa-comments"></i>
     </div>
     <div class="div">
      <h5>Titulo</h5>
      <input type="text" class="input" id="sTitulo" name="sTitulo" required>
     </div>
	  </div>
    <div class="input-div one">
     <div class="i">
      <i class="fas fa-comment-dots"></i>
     </div>
     <div class="div">
      <h5>Opinion</h5>
      <input id="sComentario" class="input" name="sTexto" required>
     </div>
    </div>
    <div class="Cont-Boton">
     <input type="submit" id="bsenviar" class="btncom" value="Comentar">
    </div>
    <div class="Parraf"><a href="/dbRestaurant/Acceso/Login.php" class="w-100">Inicia Sesion para Comentar</a></div>
   </div>
  </form>

  <?php if ($cComent->num_rows>0) {
  foreach ($cComent as $DetComent) { ?>
  <div class="Com-Individual">
   <div class="Izq-Imagen">
    <img src="/dbRestaurant/Imagenes/Usuarios/<?php echo $DetComent['sPerfil']?>" class="Img-Det" width="80px" height="80px">
   </div>
   <div class="Der-Detalle">
   <div class="Aparence">
    <div class="Cont-Nombre">
     <div class="Det-User mr-2"><b><?php echo $DetComent['sLogin'] ?></b></div>
     <div class="Det-Verificado text-primary"><b>Cliente Verificado<i class="far fa-check-circle iv ml-2"></i></b></div>
    </div>
    <div class="Det-Titulo mt-4"><b><?php echo $DetComent['sTitulo'] ?></b></div>
    <div class="Det-Comentario"><?php echo $DetComent['sTexto'] ?></div>
    <div class="Puntos mt-1">
     <span>
      <?php
      $cant=$DetComent['iCalificacion'];
      $estr=5-$cant;
      ?>
      <?php for ($i=0; $i<$cant; $i++) { ?>
      <i class="fas fa-star Iconok"></i>
      <?php } ?>
      <?php for ($i=0; $i<$estr; $i++) { ?>
      <i class="fas fa-star Iconnook"></i>
      <?php } ?>
     </span>
    </div>
    <div class="Det-Fecha mt-4"><?php echo $DetComent['dFecha'] ?></div>
   </div>
   </div>
  </div>
  <hr>
  <?php } } else { ?>
   <div class="alert alert-warning text-center" role="alert">
    <h4><b>¡SIN OPINIONES!</b></h4> Se el Primero el Comentar u Opinar 
   </div>
  <?php } ?>
 </div>
</div>

<div id="Promocion">
 <div class="Boxs">
  <img src="https://d29n1vi41wlgpp.cloudfront.net/media/wysiwyg/pre_footer_official-products.png">
  <p>CALIDAD</p>
 </div>
 <div class="Boxs">
  <img src="https://d29n1vi41wlgpp.cloudfront.net/media/wysiwyg/pre_footer_fast-shipping.png">
  <p>ENVIO RAPIDO</p>
 </div>
 <div class="Boxs">
  <img src="https://d29n1vi41wlgpp.cloudfront.net/media/wysiwyg/pre_footer_secure-payment.png">
  <p>PAGO SEGURO</p>
 </div>
</div>





<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>

<script src="js/owl.carousel.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/main.js"></script>

<?php include "../Libs/Footer.php"; ?>
<script><?php include "../Comentarios/js/Create.js" ?></script>
<script><?php include "js/Individual.js" ?></script>