function Verificar (User) {
 if (User==1) {
  location.href ="/dbRestaurant/Carrito/";
 }
 else {
  swal({
   title: "¡No estas Logueado!",
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
 }
}