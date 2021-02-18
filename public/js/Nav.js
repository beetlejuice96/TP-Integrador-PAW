class Nav {
    constructor() {
        this.menu = document.querySelector(".header__menu");
        this.body = document.querySelector("body");
        this.footer = document.querySelector("footer");
        this.main = document.querySelector("main");
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

        this.background = Paw.nuevoElemento("div","",{class:'header__hamburguesaBackground'});
        hamburguesa.appendChild(this.background);

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
                //this.blurBackground(true);
                this.clickeableBackground(true);
                this.evitarScrollBody(true);
                
            }else {
                this.evitarScrollBody(true);
                this.hamburguesa.classList.remove("cerrar");
                this.hamburguesa.classList.add("abrir");
                this.menu.classList.remove('abierto');
                this.menu.classList.add('cerrado');
                //this.blurBackground(false);
                this.clickeableBackground(false);
                this.evitarScrollBody(false);
            }
        })
    }

    blurBackground(blur){
        if(blur){
            this.main.classList.add("blured");
            this.footer.classList.add("blured");
        }
        else{
            this.main.classList.remove("blured");
            this.footer.classList.remove("blured");
        }
    }

    clickeableBackground(active){
        if(active)
            this.background.classList.add("header__hamburguesaBackgroundActive");
        else
            this.background.classList.remove("header__hamburguesaBackgroundActive");
    }

    evitarScrollBody(active){
        if(active)
            this.body.classList.add("header__menu-open")
        else
            this.body.classList.remove("header__menu-open")
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
            this.handleSubMenuEvent(button.getAttribute("value"), event.target);
        });
        var li = Paw.nuevoElemento("li", "", "");
        li.appendChild(button)
        return li;
    }

    handleSubMenuEvent(menuName, target){
        var subMenuItems = this.menu.querySelectorAll("[menu="+menuName+"]");
        console.log(subMenuItems);
        subMenuItems.forEach(subMenuItem => {
            if(subMenuItem.classList.contains("header__hamburguesa-hidden")){
                subMenuItem.classList.remove("header__hamburguesa-hidden");
                subMenuItem.classList.add("header__hamburguesa-visible");
                target.classList.add("header__sub-menu-open")
            }
            else{
                subMenuItem.classList.add("header__hamburguesa-hidden");
                subMenuItem.classList.remove("header__hamburguesa-visible")
                target.classList.remove("header__sub-menu-open")
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