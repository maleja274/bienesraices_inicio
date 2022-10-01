<?php 

use APP\Propiedad;
use Intervention\Image\ImageManagerStatic as Imagen;

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


        //validacion
        $errores = $propiedad->validar();


        //subida de archivos

        //Generar un nombre unico
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

        if($_FILES['propiedad']['tmp_name']['imagen']) {
            $image = Imagen::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            $propiedad->setImagen($nombreImagen);
        }

        if(empty($errores)) {
            //Almacenar la imagen
            $image->save(CARPETA_IMAGENES . $nombreImagen);

            $propiedad->guardar();
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