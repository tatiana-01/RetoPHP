

let myformCamper = document.querySelector("#camperForm"); 
let myHeadersCamper = new Headers({ "Content-Type": "application/json" });



myformCamper.addEventListener("submit", async (e) => { 
    let dataCamper = Object.fromEntries(new FormData(myformCamper));
    console.log(dataCamper);
    let configCamper = { 
        method: "POST",
        headers: myHeadersCamper,
        body: JSON.stringify(dataCamper)
    };
    let resCamper = await (await fetch("../../controllers/campers/insertCampers.php", configCamper)).text(); 
})

