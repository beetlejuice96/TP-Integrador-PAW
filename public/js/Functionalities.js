class Functionalities{
    constructor() {
        this.addGmailAnchorNextToMailTo();
        this.highlightActualPageInMenu();
    }

    addGmailAnchorNextToMailTo(){
        var emailParagraph = document.querySelector(".footer-email-paragraph");
        var email = document.querySelector(".footer-email").textContent;
        var gmailAnchor = Paw.nuevoElemento("a","",{"href": "https://mail.google.com/mail?view=cm&tf=0&to="+email, "class":"footer-gmail", "target":"_blank"});
        emailParagraph.append(gmailAnchor);
    }

    highlightActualPageInMenu(){
        var nav = document.querySelector("nav");
        var path = window.location.pathname;
        if(path == "/")
            path = "index";
        path = path.split("/").join("");
        var menuItem = nav.querySelector(".header__link-menu."+path);
        menuItem.classList.add("currently-active")
        if(menuItem.classList.contains("sub-menu-item"))
            var menuName = menuItem.getAttribute("menu");
            var buttonMenu = nav.querySelector("[value="+menuName+"]");
            buttonMenu.dispatchEvent(new Event('touchstart'));
    }
}