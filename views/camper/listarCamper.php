<?php 
    include_once('../../app.php');
    use Models\Campers;
    $objCampers = new Campers();
?>
<!-- HEADER -->
<?php
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
    <main class="m-0">
    <nav class="navbar navbar-expand-lg bg-secondary-subtle navbar ">
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
    <div class="content mx-auto" style="width: 90%">
         <!-- TABLA CAMPERS -->
         <h3>Listado Campers</h3>
         <div class="table-responsive">
                <table class="table table-bordered display dataTable" id="misCampers">
                    <thead class="table-dark mt-3">
                        <tr>
                            <th class="sorting_disabled" rowspan="1" colspan="1">ID Camper</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Nombres</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Apellidos</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Fecha Nacimiento</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Ciudad</th>                           
                            <th class="sorting_disabled" rowspan="1" colspan="1">opciones</th>
                        </tr>
                    </thead >
                    
                    <tbody>
                    <?php 
                    $campers=$objCampers->loadAllData();
                    
                    foreach ($campers as $camper): ?>
                        <tr  class="bg-light" >      
                            <td><?php echo "{$camper['idCamper']}" ?></td>
                            <td><?php echo "{$camper['nombreCamper']}" ?></td>
                            <td><?php echo "{$camper['apellidoCamper']}" ?></td>
                            <td><?php echo "{$camper['fechaNac']}" ?></td>
                            <?php 
                            $ciudad=$objCampers->loadDataByIdCiudad($camper['idReg']);
                            $dep=$objCampers->loadDataDepById($ciudad[0]['idDep']);
                            $pais=$objCampers->loadDataPaisById($dep[0]['idPais']);
                            ?>
                            <td id='<?php echo "{$camper['idReg']}" ?>' data-idDep='<?php echo "{$ciudad[0]['idDep']}" ?>' data-idPais='<?php echo "{$pais[0]['idPais']}" ?>'><?php echo "{$ciudad[0]['nombreReg']}" ?></td>
                            <td>
                            <div class="d-flex mx-auto mt-1">
                                <button class="btn btn-warning mx-auto" id="btnEditarCamper" data-bs-toggle="modal" data-bs-target="#editarCamper" type="submit" type="submit">Editar Camper</button>
                                <button class="btn btn-danger mx-auto" data-bs-toggle="modal" data-bs-target="#eliminarCamper" id="btnEliminarCamper" type="submit">Eliminar Camper</button>
                            </div>
                            </td>
                        </tr>
                    <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>    


       <!--  modales -->
       <div class="modal fade" id="editarCamper" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Camper </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="infoEditarCamper">
                        <form id="editarCamperForm" action="">
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
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-warning" id="editarBtnCamper">Enviar edicion</button>
                                    </div>
                         </form>
                    </div>
                    
                </div>
            </div>
        </div>
       <div class="modal fade" id="eliminarCamper" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Camper </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="infoEliminar">
                        ...
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-danger" id="borrarDefCamper">Confirmar eliminacion</a>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <!-- MAIN -->
</section>
<!-- NAVBAR -->
<link rel="stylesheet" href="../../js/DataTables/datatables.min.css">
<script src="../../js/DataTables/datatables.min.js"></script>
<script src="selects.js"></script>
<script src="controllerListarCamper.js"></script>

<script>
    $('#misCampers').DataTable().destroy();
    $('#misCampers').DataTable(  {
        pageLength: 10,
    }
    );
</script>
<!-- FOOTER -->
<?php
    include_once __DIR__ . '/../../templates/footer.php';
?>
<!-- FOOTER -->