<?php 
    include_once('../../app.php');
    use Models\Campers;
    $objCampers = new Campers();
?>
<!-- HEADER -->
<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);
    include_once __DIR__ . '/../../templates/headerCamper.php';
?>
<!-- HEADER -->

<!-- SIDEBAR -->
<?php
    include_once __DIR__ . '/../../templates/sidebar.php';
?>
<!-- SIDEBAR -->

<!-- NAVBAR -->
<section id="content">

    <!-- NAVBAR -->
    <?php
        include_once __DIR__ . '/../../templates/navbar.php';
    ?>
    <!-- NAVBAR -->

    <!-- MAIN --> 
    <!-- lo que va a cambiar en las paginas -->
    <main class="p-0">
    <nav class="navbar navbar-expand-lg bg-secondary-subtle navbar my-0">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="camper.php">Registro Campers</a>
                    <a class="nav-link" href="listarCamper.php">Listado Campers</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="content container mt-3 mx-auto" style="width: 78%">
         <!-- FORMULARIO -->
            <h3 class="mb-3" >Registro de Campers</h3>
            <hr>
            <form id="camperForm" action="">
                <div class="row  p-1">
                    <div class="mb-2 col-sm-12 col-md-6 ">
                        <label for="birthday" class="form-label">Numero de documento</label>
                        <input type="text" name="idCamper" class="form-control">
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label for="birthday" class="form-label">Fecha de Nacimiento*</label>
                        <input type="date" class="form-control" id="birthday" name="fechaNac">
                    </div>
                </div>
                <div class=" row  p-1">
                    <div class=" col-sm-12 col-md-6 ">
                        <label for="nombres" class="form-label">Nombres *</label>
                        <input type="text" class="form-control" id="nombres" name="nombreCamper">
                    </div>
                    <div class=" col-sm-12 col-md-6">
                        <label for="apellidos" class="form-label">Apellidos *</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidoCamper">
                    </div>
                </div>
                <div class="row mt-4 ">
                            <div class=" mb-2 col-sm-12 col-md-4">
                                <select class="form-select" aria-label="Default select example" id='selectPais'>
                                    <option >Selecciones un pais</option>
                                    <?php 
                                        $paises=$objCampers->loadAllDataPaises();
                                        foreach ($paises as $pais) {
                                            echo "<option value='$pais[idPais]'>".$pais['nombrePais'] ."</option>";  
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class=" mb-2 col-sm-12 col-md-4">
                                <select class="form-select" aria-label="Default select example" id='selectDpto'>
                                    <option selected>Seleccione un departamento</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class=" mb-2 col-sm-12 col-md-4">
                                <select class="form-select" aria-label="Default select example" id='selectCiudad' name="idReg">
                                    <option selected>Seleccione una ciudad</option>
                                    <option value="1">Bucaramanga</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                <div class="d-grid mx-auto mt-1">
                    <button id='botonFormMatricula' class="btn btn-success mx-auto" type="submit">Guardar</button>
                </div>
            </form>
            
    </div>

       
    </main>
    <!-- MAIN -->
</section>
<!-- NAVBAR -->

<script src="controllerCamper.js"></script>
<script src="selects.js"></script>
<!-- FOOTER -->
<?php
    include_once __DIR__ . '/../../templates/footer.php';
?>
<!-- FOOTER -->