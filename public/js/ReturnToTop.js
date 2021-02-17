class ReturnToTop {
    constructor() {
        this.botonRTT = Paw.nuevoElemento('button','ʌ',{class:'btnRTT'});
        this.insertarBoton();
        window.onscroll = ev => {this.scrollTop();}
        this.escucharClick();
    }


    insertarBoton(){
        let body = document.querySelector('body');
        console.log(body);
        body.appendChild(this.botonRTT);
    }

    scrollTop(){
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20){
            this.botonRTT.style.display="block";

        }else {
            this.botonRTT.style.display="none";
        }
    }

    escucharClick(){
        this.botonRTT.addEventListener('click',(event) => {
            document.documentElement.scrollTop = 0;
        })
    }

}
