<?php 
    
    require '../../includes/app.php';

    use App\Propiedad;
    use Intervention\Image\ImageManagerStatic as Imagen;

    estaAutenticado();
    
    $db = conectarDB();

    $propiedad = new Propiedad;

     // Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

     // Arreglo con mensaje de errores
    $errores = Propiedad::getErrores();


     //Ejecutar codigo despues de que el usuario envia formulario
     if($_SERVER['REQUEST_METHOD'] === 'POST') {


        /**Crea una nueva instancia */
        $propiedad = new Propiedad($_POST['propiedad']);

       

            /**SUBIDA DE ARCHIVOS */

            //Generar un nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            //Setear la imagen
             //Realiza un resize a la imagen con intervention
             if($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Imagen::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
            }

             //validar
             $errores = $propiedad->validar();

            if(empty($errores)) {
                

                //Crear la carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                //Guarda en la base de datos 
                $resultado = $propiedad->guardar();

                //Mensaje de exito o error
                if($resultado) {
                    //redireccionar al usurio

                    header('location: /admin?resultado=1');
            }
        }
     }

   
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="/admin" class="boton boton-verde">volver</a>

        <?php foreach($errores as $error): ?>
        <div class = "alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php"enctype="multipart/form-data">

            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="Submit"value="Crear Propiedad" class="boton-verde"> 
        </form>
    </main>
<?php 
    incluirTemplate('footer');
?>