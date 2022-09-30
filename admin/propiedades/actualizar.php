<?php 

use APP\Propiedad;

require '../../includes/app.php';

estaAutenticado();

    // Validar la URL para ID valido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('location: /admin');
    }
     
     // Obtener los datos de la propiedad
     $propiedad = Propiedad::find($id);

  
    

     // Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

     // Arreglo con mensaje de errores
    $errores = Propiedad::getErrores();

     //Ejecutar codigo despues de que el usuario envia formulario
     if($_SERVER['REQUEST_METHOD'] === 'POST') {

        //Asignar los atributos
        $args = $_POST['propiedad'];
       
        $propiedad->sincronizar($args);

        $errores = $propiedad->validar();

        if(empty($errores)) {

            // //Crear carpeta
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            $nombreImagen = '';


            // /**SUBIDA DE ARCHIVOS */

            if($imagen['name']) {
                //Eliminar la imagen previa
                unlink($carpetaImagenes . $propiedad['imagen']);

                // //Generar un nombre unico
                $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
            

                // //Subir imagen
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

            } else {
                $nombreImagen = $propiedad['imagen'];
            }
               

            
    

            //Insertar en la base de datos
            $query = " UPDATE propiedades SET titulo = '${titulo}', precio = '${precio}', imagen = '${nombreImagen}', descripcion = 
            '${descripcion}', habitaciones = ${habitaciones}, wc = ${wc}, estacionamiento = ${estacionamiento}, vendedores_id = 
            ${vendedores_id} WHERE id = ${id} ";
            // echo $query;
           

            $resultado = mysqli_query($db, $query);

            if($resultado) {
                //redireccionar al usurio

                header('location: /admin?resultado=2');
            }
        }
     }

    
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>
        <a href="/admin" class="boton boton-verde">volver</a>

        <?php foreach($errores as $error): ?>
        <div class = "alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" enctype="multipart/form-data">

        <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="Submit"value="Actualizar Propiedad" class="boton-verde"> 
        </form>
    </main>
<?php 
    incluirTemplate('footer');
?>