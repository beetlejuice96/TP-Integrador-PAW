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
            //this.botonRTT.style.display="block";
            this.botonRTT.classList.add('btnRTT-block');
            this.botonRTT.classList.remove('btnRTT-none');
        }else {
            this.botonRTT.classList.remove('btnRTT-block');
            this.botonRTT.classList.add('btnRTT-none');
        }
    }

    escucharClick(){
        this.botonRTT.addEventListener('click',(event) => {
            document.documentElement.scrollTop = 0;
        })
    }

}
