<?php 
    // Base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    // Arreglo con mensaje de errores
    $errores = [];




    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        $titulo = $_POST['titulo'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $habitaciones = $_POST['habitaciones'];
        $wc = $_POST['wc'];
        $estacionamiento = $_POST['estacionamiento'];
        $vendedorId = $_POST['vendedor'];

        if(!$titulo) {
            $errores[] = "Debes añadir un titulo";
        }

        if(!$precio) {
            $errores[] = "El precio es obligatorio";
        }

        if(strlen($descripcion) < 50) {
            $errores[] = "La descripcion es obligatoriay debe tener al menos 50 caracteres";
        }
        
        echo "<pre>";
        var_dump($errores);
        echo "</pre>";

        exit;

        //Insertar en la base de datos

    $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedorId) VALUES ('$titulo', 
    '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$vendedorId')";
    // echo($query);

    $resultado = mysqli_query($db, $query);

    if($resultado) {
        echo "insertado correctamente";
    }
    } 

    require '../../includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor">
        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>
        <form class="formulario" method="POST" action="/admin/propiedades/crear.php">
            <fieldset>
                <legend>Informacion General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo propiedad">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio propiedad">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/png">
                
                <label for="descripcion">Descripcion:</label>
                <textarea id="descrpcion" name="descripcion"></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9">

                <label for="wc">Baños</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9">

                <label for="estacionamiento">Estacionamiento</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>
                <select name="vendedorId">
                    <option value="1">Aleja</option>
                    <option value="2">Raul</option>
                </select>
            </fieldset>

            <input type="Submit"value="Crear Propiedad" class="boton-verde"> 
        </form>
    </main>
<?php 
    incluirTemplate('footer');
?>