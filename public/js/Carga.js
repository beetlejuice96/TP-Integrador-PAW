class Carga {
    constructor() {
        document.addEventListener('DOMContentLoaded',()=>{
            Paw.cargarScript("Nav","js/Nav.js",()=>{
                let menu=new Nav();
            });
        })
    }
}
let carga = new Carga();


