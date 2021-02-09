class Nav {
    constructor() {
        this.menu = document.querySelector(".header__menu");
        this.menu.classList.add('cerrado');
        this.hamburguesa = this.insertarHamburguesa();
        console.log(this.hamburguesa);
        this.escucharClick();
    }


    insertarHamburguesa(){
        var hamburguesa = Paw.nuevoElemento("div","",);
        hamburguesa.classList.add("header__hamburguesa");
        hamburguesa.classList.add("abrir");

        var lineaHamburgesa1= Paw.nuevoElemento("span","",{class:'header__hamburguesaLinea'});
        hamburguesa.appendChild(lineaHamburgesa1);

        var lineaHamburgesa2= Paw.nuevoElemento("span","",{class:'header__hamburguesaLinea'});
        hamburguesa.appendChild(lineaHamburgesa2);

        var lineaHamburgesa3= Paw.nuevoElemento("span","",{class:'header__hamburguesaLinea'});
        hamburguesa.appendChild(lineaHamburgesa3);

        document.querySelector("body>header").appendChild(hamburguesa);
        return hamburguesa;
    }


    escucharClick(){

        document.querySelector('.header__hamburguesa').addEventListener("click",(event)=>{
            if(this.hamburguesa.classList.contains("abrir")) {
                this.hamburguesa.classList.remove("abrir");
                this.hamburguesa.classList.add("cerrar");
                this.menu.classList.add('abierto');
                this.menu.classList.remove('cerrado');

            }else {
                this.hamburguesa.classList.remove("cerrar");
                this.hamburguesa.classList.add("abrir");
                this.menu.classList.remove('abierto');
                this.menu.classList.add('cerrado');

            }
        })
    }
}