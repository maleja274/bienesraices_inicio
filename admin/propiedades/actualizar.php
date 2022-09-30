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
    $errores = [];

    $titulo = $propiedad ['titulo'];
    $precio = $propiedad ['precio'];
    $descripcion = $propiedad ['descripcion'];
    $habitaciones = $propiedad ['habitaciones'];
    $wc = $propiedad ['wc'];
    $estacionamiento = $propiedad ['estacionamiento'];
    $vendedores_id = $propiedad ['vendedores_id'];
    $imagenPropiedad = $propiedad ['imagen'];

     //Ejecutar codigo despues de que el usuario envia formulario
     if($_SERVER['REQUEST_METHOD'] === 'POST') {

        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";
        // exit;

        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";


       
        $titulo = mysqli_real_escape_string( $db,  $_POST['titulo'] );
        $precio = mysqli_real_escape_string( $db,  $_POST['precio'] );
        $descripcion = mysqli_real_escape_string( $db,  $_POST['descripcion'] );
        $habitaciones = mysqli_real_escape_string( $db,  $_POST['habitaciones'] );
        $wc = mysqli_real_escape_string( $db,  $_POST['wc'] );
        $estacionamiento = mysqli_real_escape_string( $db,  $_POST['estacionamiento'] );
        $vendedores_id = mysqli_real_escape_string( $db,  $_POST['vendedor'] );
        $creado = date('Y/m/d');

        //Asignar files hacia una variable
        $imagen = $_FILES['imagen'];


        if(!$titulo) {
            $errores[] = "Debes añadir un titulo";
        }

        if(!$precio) {
            $errores[] = "El precio es obligatorio";
        }

        if(strlen($descripcion) < 50) {
            $errores[] = "La descripcion es obligatoria y debe tener al menos 50 caracteres";
        }

        if(!$habitaciones) {
            $errores[] = "El numero de habitaciones es obligatoria";
        }

        if(!$wc) {
            $errores[] = "El numero de wc es obligatorio";
        }

        if(!$estacionamiento) {
            $errores[] = "El numero de estacionamientos es obligatorio";
        }

        if(!$vendedores_id) {
            $errores[] = "Elige un vendedor";
        }


        // Validar pot tamaño (1mg maximo)
        $medida = 1000 * 1000;

        if($imagen['size'] > $medida) {
            $errores[] = 'la imagen es pesada';
        }

        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";

        // Revisa que el array de errores este vacio
       
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
           

            <input type="Submit"value="Actualizar Propiedad" class="boton-verde"> 
        </form>
    </main>
<?php 
    incluirTemplate('footer');
?>