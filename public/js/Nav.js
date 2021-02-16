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
            var liWithButton = this.createLiWithButton(primerHijo.getAttribute("value"));
            primerHijo.parentNode.parentNode.insertBefore(liWithButton, primerHijo.parentNode);
        });
        this.setAllHidden();
    }

    createLiWithButton(textContent){
        var menuName = textContent.split(" ").join("-").toLowerCase();
        var button = Paw.nuevoElemento("button", "", {"value":menuName, "class":"header__button-menu"});
        button.textContent = textContent;
        button.addEventListener("touchstart", (event)=>{
            this.handleSubMenuEvent(button.getAttribute("value"));
        });
        var li = Paw.nuevoElemento("li", "", "");
        li.appendChild(button)
        return li;
    }

    handleSubMenuEvent(menuName){
        var subMenuItems = this.menu.querySelectorAll("."+menuName);
        subMenuItems.forEach(subMenuItem => {
            if(subMenuItem.classList.contains("header__hamburguesa-hidden")){
                subMenuItem.classList.remove("header__hamburguesa-hidden");
                subMenuItem.classList.add("header__hamburguesa-visible");
            }
            else{
                subMenuItem.classList.add("header__hamburguesa-hidden");
                subMenuItem.classList.remove("header__hamburguesa-visible")
            }
        });
    }

    setAllHidden(){
        var subMenuItems = this.menu.querySelectorAll(".sub-menu-item");
        subMenuItems.forEach(subMenuItem => {
            subMenuItem.classList.add("header__hamburguesa-hidden");
        });
    }
}