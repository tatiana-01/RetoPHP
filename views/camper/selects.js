let selectPais=document.querySelector('#selectPais');
let selectRegion=document.querySelector('#selectDpto');
let selectCiudad=document.querySelector('#selectCiudad');
let myHeadersSelect = new Headers({ "Content-Type": "application/json" })
innerSelectRegion(selectPais.value);
innerSelectCiudad(selectRegion.value);



selectPais.addEventListener('change',async(e) =>{
    let valor= e.target.value;
    innerSelectRegion(valor);

});

async function innerSelectRegion(valor){
    selectRegion.innerHTML='';
    try{
        let config = { //creamos la configuracion que vamos a pasar al fetch
            method: "POST",
            headers: myHeadersSelect,
            body: JSON.stringify(valor)
        };
        let res = await (await fetch("../../controllers/campers/dataSelectRegiones.php", config)).text();
        let regiones=JSON.parse(res);
        selectRegion.innerHTML='<option>Seleccione una region</option>';
        regiones.forEach( (region)=> {
            const option = document.createElement('option');
            option.value = region.idDep;
            option.innerText = region.nombreDep;
            selectRegion.appendChild(option);
        });
        
        
        
    } catch (error) {
        console.error(error);
    }
}


selectRegion.addEventListener('change',async(e) =>{
    let valor= e.target.value;
    innerSelectCiudad(valor);

});

async function innerSelectCiudad(valor){
    selectCiudad.innerHTML='';
    try{
        let config = { //creamos la configuracion que vamos a pasar al fetch
            method: "POST",
            headers: myHeadersSelect,
            body: JSON.stringify(valor)
        };
        let res = await (await fetch("../../controllers/campers/dataSelectCiudades.php", config)).text();
        let ciudades=JSON.parse(res);
        selectCiudad.innerHTML='<option>Seleccione una ciudad</option>';
        ciudades.forEach( (ciudad)=> {
            const option = document.createElement('option');
            option.value = ciudad.idReg;
            option.innerText = ciudad.nombreReg;
            selectCiudad.appendChild(option);
        });
 
        
    } catch (error) {
        console.error(error);
    }
}