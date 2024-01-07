let tamH1 = 28;
let tamH2 = 24;
let tamH3 = 14;
let tamP = 18;

function aumentarLetra(){
    if(tamH1 <= 32){
        tamH1++;
    }
    if(tamH2 <= 28){
        tamH2++;
    }
    if(tamH3 <= 18){
        tamH3++;
    }
    if (tamP <= 22){
        tamP++;
    }
    const h1 = document.querySelectorAll(".body h1");
    const h2 = document.querySelectorAll(".body h2");
    const h3 = document.querySelectorAll(".body h3");
    const p = document.querySelectorAll(".body p");
    for(let i = 0; i < h1.length; i++){
        h1[i].style.fontSize = `${tamH1}px`;
    }
    for(let i = 0; i < h2.length; i++){
        h2[i].style.fontSize = `${tamH2}px`;
    }
    for(let i = 0; i < h3.length; i++){
        h3[i].style.fontSize = `${tamH3}px`;
    }
    for(let i = 0; i < p.length; i++){
        p[i].style.fontSize = `${tamP}px`;
    }
}
function diminuirLetra(){
    if(tamH1 >= 24){
        tamH1--;
    }
    if(tamH2 >= 20){
        tamH2--;
    }
    if(tamH3 >= 10){
        tamH3--;
    }
    if (tamP >= 14){
        tamP--;
    }
    const h1 = document.querySelectorAll(".body h1");
    const h2 = document.querySelectorAll(".body h2");
    const h3 = document.querySelectorAll(".body h3");
    const p = document.querySelectorAll(".body p");
    for(let i = 0; i < h1.length; i++){
        h1[i].style.fontSize = `${tamH1}px`;
    }
    for(let i = 0; i < h2.length; i++){
        h2[i].style.fontSize = `${tamH2}px`;
    }
    for(let i = 0; i < h3.length; i++){
        h3[i].style.fontSize = `${tamH3}px`;
    }
    for(let i = 0; i < p.length; i++){
        p[i].style.fontSize = `${tamP}px`;
    }
}
function resetarLetra(){
    const h1 = document.querySelectorAll(".body h1");
    const h2 = document.querySelectorAll(".body h2");
    const h3 = document.querySelectorAll(".body h3");
    const p = document.querySelectorAll(".body p");
    for(let i = 0; i < h1.length; i++){
        h1[i].style.fontSize = "28px";
    }
    for(let i = 0; i < h2.length; i++){
        h2[i].style.fontSize = "24px";
    }
    for(let i = 0; i < h3.length; i++){
        h3[i].style.fontSize = "14px";
    }
    for(let i = 0; i < p.length; i++){
        p[i].style.fontSize = "18px";
    }
}
function colocarContraste(){
    let body = document.querySelector("body");
    body.classList.toggle("contraste");
}
function trocarSubMenu(elemento, conteudo){
    let botoes = document.querySelectorAll(".pdticPedtic-submenu button");
    let textos = document.querySelectorAll(".pdticPedtic-conteudo");
    for(let i = 0; i<botoes.length;i++){
        if(botoes[i].classList.contains("pdticPedtic-clicado")){
            botoes[i].classList.remove("pdticPedtic-clicado");
        }
        if(!(textos[i].classList.contains("escondido"))){
            textos[i].classList.add("escondido");
        }
    }
    textos[conteudo].classList.remove("escondido");
    elemento.classList.add("pdticPedtic-clicado");
}
function atasTrocarSubMenu(elemento, conteudo){
    let botoes = document.querySelectorAll(".atas-abas button");
    let textos = document.querySelectorAll(".atas-conteudo");
    for(let i = 0; i<botoes.length;i++){
        if(botoes[i].classList.contains("selecionado")){
            botoes[i].classList.remove("selecionado");
        }
        if(!(textos[i].classList.contains("escondido"))){
            textos[i].classList.add("escondido");
        }
    }
    textos[conteudo].classList.remove("escondido");
    elemento.classList.add("selecionado");
}