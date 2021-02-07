class Functionalities{
    constructor() {
        this.addGmailAnchorNextToMailTo();
    }

    addGmailAnchorNextToMailTo(){
        var emailParagraph = document.querySelector(".footer-email-paragraph");
        var email = document.querySelector(".footer-email").textContent;
        var gmailAnchor = Paw.nuevoElemento("a","",{"href": "https://mail.google.com/mail?view=cm&tf=0&to="+email, "class":"footer-gmail", "target":"_blank"});
        emailParagraph.append(gmailAnchor);
    }
}