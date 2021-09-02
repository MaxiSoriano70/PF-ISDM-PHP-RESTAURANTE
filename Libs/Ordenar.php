<?php if (!empty($_GET['Orden'])) {
 $Orden=$_GET['Orden'];

 if ($Orden=="Relevante") {
  echo '<div class="w-100 my-5 px-3 text-right">';
  echo '<div class="btn-group">';
  echo '<button type="button" class="btn btn-danger dropdown-toggle p-3 px-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
  echo 'Mas Relevante';
  echo '</button>';
  echo '<div class="dropdown-menu w-100 text-center">';
  echo '<a class="dropdown-item disabled" href="Index.php?Orden=Relevante">Mas Relevante</a>';
  echo '<div class="dropdown-divider"></div>';
  echo '<a class="dropdown-item" href="Index.php?Orden=Mayor">Mayor Precio</a>';
  echo '<a class="dropdown-item" href="Index.php?Orden=Menor">Menor Precio</a>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
 }

 else if ($Orden=="Mayor") {
  echo '<div class="w-100 my-5 px-3 text-right">';
  echo '<div class="btn-group">';
  echo '<button type="button" class="btn btn-danger dropdown-toggle p-3 px-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
  echo 'Mayor Precio';
  echo '</button>';
  echo '</button>';
  echo '<div class="dropdown-menu w-100 text-center">';
  echo '<a class="dropdown-item disabled" href="Index.php?Orden=Relevante">Mayor Precio</a>';
  echo '<div class="dropdown-divider"></div>';
  echo '<a class="dropdown-item" href="Index.php?Orden=Relevante">Mas Relevante</a>';
  echo '<a class="dropdown-item" href="Index.php?Orden=Menor">Menor Precio</a>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
 }

 else {
  echo '<div class="w-100 my-5 px-3 text-right">';
  echo '<div class="btn-group">';
  echo '<button type="button" class="btn btn-danger dropdown-toggle p-3 px-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
  echo 'Menor Precio';
  echo '</button>';
  echo '<div class="dropdown-menu w-100 text-center">';
  echo '<a class="dropdown-item disabled" href="Index.php?Orden=Relevante">Menor Precio</a>';
  echo '<div class="dropdown-divider"></div>';
  echo '<a class="dropdown-item" href="Index.php?Orden=Relevante">Mas Relevante</a>';
  echo '<a class="dropdown-item" href="Index.php?Orden=Mayor">Mayor Precio</a>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
 }    
}

else {
 echo '<div class="w-100 my-5 px-3 text-right">';
 echo '<div class="btn-group">';
 echo '<button type="button" class="btn btn-danger dropdown-toggle p-3 px-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
 echo 'Ordenarlos Por';
 echo '</button>';
 echo '<div class="dropdown-menu w-100 text-center">';
 echo '<a class="dropdown-item" href="Index.php?Orden=Relevante">Mas Relevante</a>';
 echo '<a class="dropdown-item" href="Index.php?Orden=Mayor">Mayor Precio</a>';
 echo '<a class="dropdown-item" href="Index.php?Orden=Menor">Menor Precio</a>';
 echo '</div>';
 echo '</div>';
 echo '</div>';
}
?>




