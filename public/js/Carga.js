class Carga {
    constructor() {
        document.addEventListener('DOMContentLoaded',()=>{
            Paw.cargarScript("Nav","js/Nav.js",()=>{
                let menu=new Nav();
            });

            Paw.cargarScript("Functionalities","js/Functionalities.js",()=>{
                let menu=new Functionalities();
            });

            Paw.cargarScript("ReturnToTop","js/ReturnToTop.js",()=>{
                let rtt = new ReturnToTop();
            })
        })
    }
}
let carga = new Carga();


