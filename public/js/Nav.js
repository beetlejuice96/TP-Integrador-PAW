class Nav {
    constructor() {
        let nav = document.querySelector(".header__menu");
        this.hamburguesa = this.insertarHamburguesa();
        console.log(this.hamburguesa);
        this.escucharClick();
    }


    insertarHamburguesa(){
        var hamburguesa = Paw.nuevoElemento("div","",{});
        hamburguesa.classList.add("header__hamburguesa");
        hamburguesa.classList.add("abrir");
        hamburguesa.appendChild(Paw.nuevoElemento("span","",{}));
        hamburguesa.appendChild(Paw.nuevoElemento("span","",{}));
        hamburguesa.appendChild(Paw.nuevoElemento("span","",{}));
        document.querySelector("body>header").appendChild(hamburguesa);
        return hamburguesa;
    }

    escucharClick(){

        this.hamburguesa.addEventListener("click",(event)=>{
            if(event.target.classList.contains("abrir")) {
                event.target.classList.remove("abrir");
                event.target.classList.add("cerrar");
            }else {
                event.target.classList.remove("cerrar");
                event.target.classList.add("abrir");
            }
        })
    }
















}
