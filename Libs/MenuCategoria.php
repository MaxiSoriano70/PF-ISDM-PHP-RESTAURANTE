<?php     
 $sql="select * from Categorias";
 $Categorias=preparar_select($Conexion,$sql);
?>

<style><?php include 'css/MenuCategoria.css'?></style>
<div class="sticky-top" style="z-index:5">
 <nav class="navbar navbar-expand-lg navbar-light border-top enc p-0" style="background: #2e9ce0;">
  <a class="navbar-brand d-lg-none d-xl-none text-white tcs">Categorias</a>
  
  <button class="navbar-toggler bn-cat" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
   <i class="fas fa-bars" style="color:#fff;"></i>
  </button>
  <div class="collapse navbar-collapse NavCategorias" id="navbarNavDropdown">
   <ul class="navbar-nav ul-cat">
   <?php foreach($Categorias as $Categoria) { ?>
    <li class="nav-item active">
     <a class="nav-link" href="/dbRestaurant/Index.php?iIdCategoria=<?php echo $Categoria['iIdCategoria'];?>"><?php echo $Categoria['sNombre']?></a>
    </li>
   <?php } ?>
   </ul>
  </div>
 </nav>
</div>