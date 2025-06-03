// main.js

// Animação dos olhos do guaxinim
const emailInput = document.querySelector('.form-box.login input[name="nEmail"]');
const senhaInput = document.querySelector('.form-box.login input[name="nSenha"]');
const olhos = document.querySelector('#olhos');

function trocarOlho(nome) {
    olhos.src = `img/guaxinim/${nome}.jpeg`;
}

emailInput.addEventListener('input', () => {
    const valor = emailInput.value.length;
    let frame;
    if (valor === 0) frame = "guaxinim";
    else if (valor < 5) frame = "olho1";
    else if (valor < 10) frame = "olho2";
    else if (valor < 20) frame = "olho3";
    else if (valor < 30) frame = "olho4";
    else frame = "olho5";
    trocarOlho(frame);
});

emailInput.addEventListener('focus', () => trocarOlho("guaxinim"));
emailInput.addEventListener('blur', () => trocarOlho("guaxinim"));
senhaInput.addEventListener('focus', () => trocarOlho("olho6"));
senhaInput.addEventListener('blur', () => trocarOlho("guaxinim"));

// Piscada automática
let piscando = false;
setInterval(() => {
    if (!piscando) {
        piscando = true;
        const imagemAtual = olhos.src;
        if (imagemAtual.includes("olho6.jpeg")) {
            trocarOlho("pisca2");
        } else {
            trocarOlho("pisca");
        }
        setTimeout(() => {
            olhos.src = imagemAtual;
            piscando = false;
        }, 200);
    }
}, 4000);
