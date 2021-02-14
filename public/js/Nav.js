class Nav {
    constructor() {
        this.menu = document.querySelector(".header__menu");
        this.crearSubMenues();
        this.menu.classList.add('cerrado');
        this.hamburguesa = this.insertarHamburguesa();
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

        var backgroundHamburguesa= Paw.nuevoElemento("div","",{class:'header__hamburguesaBackground'});
        hamburguesa.appendChild(backgroundHamburguesa);

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
                this.blurBackground(true);
                this.clickeableBackground(true);
                
            }else {
                this.hamburguesa.classList.remove("cerrar");
                this.hamburguesa.classList.add("abrir");
                this.menu.classList.remove('abierto');
                this.menu.classList.add('cerrado');
                this.blurBackground(false);
                this.clickeableBackground(false);
            }
        })
    }

    blurBackground(blur){
        var main = document.querySelector("main");
        var footer = document.querySelector("footer");
        if(blur){
            main.classList.add("blured");
            footer.classList.add("blured");
        }
        else{
            main.classList.remove("blured");
            footer.classList.remove("blured");
        }
    }

    clickeableBackground(active){
        var backgroundHamburguesa = document.querySelector(".header__hamburguesaBackground");
        if(active)
            backgroundHamburguesa.classList.add("header__hamburguesaBackgroundActive");
        else
            backgroundHamburguesa.classList.remove("header__hamburguesaBackgroundActive");
    }

    crearSubMenues(){
        var primerosHijos = this.menu.querySelectorAll(".primerHijo");
        primerosHijos.forEach(primerHijo => {
            var liPadreSubMenu = primerHijo.parentNode;
            this.crearSubMenu(primerHijo.getAttribute("value"));
            this.agregarHermanosAlSubMenu(primerHijo);
            liPadreSubMenu.appendChild(this.menuAnidado);
        });
    }

    crearSubMenu(nombrePadre){
        this.menuAnidado = Paw.nuevoElemento("ul", "", "");
        var padre = Paw.nuevoElemento("button", "", "");
        padre.textContent = nombrePadre;
        this.agregarAlSubMenu(padre);
        
    }

    agregarAlSubMenu(elemento){
        var liPadre = null;
        if(elemento.tagName == "A" && !elemento.classList.contains("primerHijo"))
            liPadre = elemento.parentElement;
        var li = Paw.nuevoElemento("li", "", "");
        li.appendChild(elemento);
        this.menuAnidado.appendChild(li);
        if(liPadre)
            liPadre.parentElement.removeChild(liPadre);
    }

    agregarHermanosAlSubMenu(hermanoMayor){
        var ultimoHermano = false;
        while(!ultimoHermano){
            var anchorHermano = hermanoMayor.parentElement.nextElementSibling.childNodes[0];
            if(anchorHermano.classList.contains("ultimoHijo")){
                ultimoHermano = true;
            }
            this.agregarAlSubMenu(hermanoMayor);
            hermanoMayor = anchorHermano;
        }
        this.agregarAlSubMenu(hermanoMayor);
    }
}