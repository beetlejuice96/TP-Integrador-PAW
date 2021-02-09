class Carousel{
    constructor(listaImagenes, tagPadre) {
        this.inicializarVariables(listaImagenes, tagPadre);

        let index = 0;

        this.crearProgressBar();
        this.crearContenedorDeThumbs();
            
        listaImagenes.forEach(element =>
        {
            let imagenCarousel = Paw.nuevoElemento("img","",{"src": element, "class": "img-carousel loading", "index":index });
            imagenCarousel.addEventListener("load", event=>{
                imagenCarousel.classList.remove("loading");
                this.actualizarProgressBar();
            });

            imagenCarousel.addEventListener("transitionend", (event)=>{
                setTimeout(()=>{
                    //console.log(this.userInteracted);
                    if(this.userInteracted == false)
                        if(event.target.classList.contains("active"))
                            this.handleEvent();
                    
                }, 4500);
            });

            this.crearNuevoThumb(index);
            
            if (index == 0)
                imagenCarousel.classList.add("img-active");

            this.contenedorCarousel.appendChild(imagenCarousel);

            index++;
        });

        /* Lo agrego cuando ya tiene todos los thumbs cargados*/
        this.contenedorCarousel.appendChild(this.contenedorThumbs); 

        this.agregarListenersDeTeclas();

        this.tagPadreDelCarousel.appendChild(this.contenedorCarousel);
    }

    //Set random image active
    //setRandomImageActive(){}

    inicializarVariables(listaImagenes, tagPadre){
        this.tagPadreDelCarousel = document.querySelector(tagPadre);
        this.indice=0;
        this.listaImagenes = listaImagenes;
        this.loadedImages=0;
        this.imageCount=listaImagenes.length;
        this.userInteracted = false;
        this.contenedorCarousel = Paw.nuevoElemento("article", "", {"class": "carousel"});
        this.asignarEventoSwipe();
    }

    crearProgressBar(){
        this.progressBar = Paw.nuevoElemento("div", "", {"class": "progressBar"});
        this.actualProgress = Paw.nuevoElemento("div", "", {"class": "progress"});
        this.progressBar.appendChild(this.actualProgress);
        this.contenedorCarousel.appendChild(this.progressBar);
    }

    actualizarProgressBar(){
        this.loadedImages++;
        let averageOfLoad = (this.loadedImages / this.imageCount) * 100;
        if(averageOfLoad == 100){
            this.contenedorCarousel.removeChild(this.progressBar);
            this.handleEvent();
        }
        else
            this.actualProgress.style.setProperty("--ancho", averageOfLoad+"vw");
    }

    crearContenedorDeThumbs(){
        this.contenedorThumbs = Paw.nuevoElemento("div","",{"name":"contenedorThumbs","class":"carousel-contenedor-thumbs"});
        this.buttonPrevious = Paw.nuevoElemento("button","Prev",{"class": "carousel-button-prev"});
        this.buttonPrevious.addEventListener("click",() =>{this.handleButtonEvent(0)})
        this.contenedorCarousel.appendChild(this.buttonPrevious);
        this.buttonNext = Paw.nuevoElemento("button","Next",{"class": "carousel-button-next"});
        this.buttonNext.addEventListener("click",() =>{this.handleButtonEvent(1)})
        this.contenedorCarousel.appendChild(this.buttonNext);
    }

    crearNuevoThumb(index){
        let thumb = Paw.nuevoElemento("button","",{"class":"carousel-thumb","index":index, "width":60, "height":60})
        if(index == 0){
            thumb.classList.add("carousel-thumb-active");
        }
        thumb.addEventListener("click",()=>{
            this.userInteracted = true;
            let previousIndex = this.indice;
            this.indice = parseInt(thumb.getAttribute("index"));
            this.carouselImagesEvent(previousIndex, this.indice);
        });
        this.contenedorThumbs.appendChild(thumb);
    }

    handleButtonEvent(direction){
        this.userInteracted = true;
        let previousIndex = this.getIndex();
        if(direction == 1)
            this.getNext();
        else
            this.getPrevious();
        this.carouselImagesEvent(previousIndex, this.indice);
    }

    agregarListenersDeTeclas(){
        document.addEventListener('keydown', (event) => {
            const keyName = event.key;
            if (keyName=="ArrowLeft"){
                this.handleButtonEvent(0);

            }else if (keyName == "ArrowRight"){
                this.handleButtonEvent(1);
            }
        });
    }

    asignarEventoSwipe(){
        this.contenedorCarousel.addEventListener("touchstart", (event)=>{
            this.xDown  =  event.changedTouches[0].clientX;
        });

        this.contenedorCarousel.addEventListener("touchend", (event)=>{
            var  xUp  =  event.changedTouches[0].clientX;
            this.xDiff  = this.xDown  -  xUp;
            
            if(this.xDown){
                if (Math.abs(this.xDiff) !==  0) {
                    console.log(this.xDiff);
                    if (this.xDiff  >= 125) {
                        this.handleButtonEvent(0);
                    } else  if (this.xDiff  <=  -125) {
                        this.handleButtonEvent(1);
                    }
                }
            }
            this.xDown  =  null;
        });
    }

    getPrevious(){
        if ((this.indice)== 0 ){
            this.indice=this.listaImagenes.length-1;
            return this.indice;
        }else {
            this.indice--;
            return this.indice;
        }
    }

    getNext() {
        if((this.indice+1) ==this.listaImagenes.length){
            this.indice=0;
        }else {
            this.indice++;
        }
    }

    setActiveThumb(previous, active){
        let circuloActual = document.querySelector(".carousel-thumb[index=\""+previous+"\"]");
            circuloActual.classList.remove("carousel-thumb-active");

        let circuloSiguente = document.querySelector(".carousel-thumb[index=\""+active+"\"]");
            circuloSiguente.classList.add("carousel-thumb-active");
    }

    getIndex(){
        return this.indice;
    }

    carouselImagesEvent(previousIndex, nextIndex){
        let imagenActual = document.querySelector(".img-carousel[index=\""+previousIndex+"\"]");
        imagenActual.classList.remove("img-active");
        let imagenSiguiente = document.querySelector(".img-carousel[index=\""+nextIndex+"\"]");
        imagenSiguiente.classList.add("img-active");
        this.setActiveThumb(previousIndex, nextIndex);
    }

    handleEvent(){
        let previousIndex = this.getIndex();
        this.getNext();
        this.carouselImagesEvent(previousIndex, this.indice); 
    }

    userInteracted(){
        return this.userInteracted;
    }
}

document.addEventListener("DOMContentLoaded", () => {
    let listaImagenes =[
        "/images/PruebaCarousel1.jpg",
        "/images/PruebaCarousel2.jpg",
        "/images/PruebaCarousel3.jpg"
    ]
    let carousel = new Carousel(listaImagenes, "main");
});