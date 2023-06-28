let myHeadersCamper = new Headers({ "Content-Type": "application/json" });
$(document).ready(function() {
    var tabla = $('#misCampers').DataTable();
    // Evento click en los botones dentro de la tabla
    $('#misCampers tbody').on('click', '#btnEliminarCamper', function() {
        row = tabla.row($(this).parents('tr'));
        var fila = tabla.row($(this).closest('tr')).data();
        idBorrar = fila[0]; // Obtener el valor de la columna 'Nombre'

        // Abrir el modal y mostrar el nombre del usuario
        modalEliminar(fila[0], fila[1]);
    });
    $('#misCampers tbody').on('click', '#btnEditarCamper', function() {
        
        const frm = document.querySelector('#editarCamperForm');
        const inputsData = new FormData(frm);
        row = tabla.row($(this).parents('tr'));
        let fila = tabla.row($(this).closest('tr')).data();
        inputsData.set("idCamper",fila[0]);
        inputsData.set("nombreCamper",fila[1]);
        inputsData.set("apellidoCamper",fila[2]);
        inputsData.set("fechaNac",fila[3]);
    
        
        // Itera a través de los pares clave-valor de los datos
        for (var pair of inputsData.entries()) {
            console.log(pair);
            console.log( pair[1]);
            // Establece los valores correspondientes en el formulario
            frm.elements[pair[0]].value = pair[1];
        }
    });
});


function modalEliminar (idpk, info) {
    document.querySelector('#infoEliminar').innerHTML = /*html*/'Desea eliminar el camper: <b>' + info + '</b> con ID: ' + idpk;
    let btnEliminarCamper=document.querySelector('#borrarDefCamper');
    btnEliminarCamper.setAttribute("href",`../../controllers/campers/deleteCamper.php?idCamper=${idpk}`);
}

let myformEditCamper = document.querySelector("#editarCamperForm"); //seleccionamos el formulario
console.log(myformEditCamper);
myformEditCamper.addEventListener("submit", async (e) => { 
    console.log('si');
    let dataEditCamper = Object.fromEntries(new FormData(e.target)); 
    let config = { 
        method: "POST",
        headers: myHeadersCamper,
        body: JSON.stringify(dataEditCamper)
    };
    console.log(dataEditCamper);
    let res = await (await fetch("../../controllers/campers/editCamper.php", config)).text();
    console.log(res); 
   
})