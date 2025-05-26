const container = document.querySelector('.container');
const registerBtn = document.querySelector('.register-btn');
const loginBtn = document.querySelector('.login-btn');

registerBtn.addEventListener('click', () => {
    container.classList.add('active');
})

loginBtn.addEventListener('click', () => {
    container.classList.remove('active');
})



registerBtn.addEventListener('click', () => {
    container.classList.add('active');
});

loginBtn.addEventListener('click', () => {
    container.classList.remove('active');
});

// Animação dos olhos do guaxinim
const emailInput = document.querySelector('.form-box.login input[name="nEmail"]');
const senhaInput = document.querySelector('.form-box.login input[name="nSenha"]');
const olhos = document.querySelector('#olhos');

// Função para trocar a imagem do olho
function trocarOlho(nome) {
    olhos.src = `img/guaxinim/${nome}.jpeg`;
}

// Movimentação dos olhos acompanhando o preenchimento do e-mail
emailInput.addEventListener('input', () => {
    const valor = emailInput.value.length;
    let frame;

    if (valor === 0) {
        frame = "guaxinim"; // Olho neutro
    } else if (valor < 5) {
        frame = "olho1"; // Primeiro olho
    } else if (valor < 10) {
        frame = "olho2"; // 
    } else if (valor < 20) {
        frame = "olho3"; // Olho mais focado
    } else if (valor < 30) {
        frame = "olho4"; // Olho bem direcionado
    } else {
        frame = "olho5"; // Olho fixo
    }
    trocarOlho(frame);
});

emailInput.addEventListener('focus', () => {
    trocarOlho("guaxinim"); // Olho neutro ao focar no campo de e-mail
});

emailInput.addEventListener('blur', () => {
    trocarOlho("guaxinim"); // Olho neutro ao sair do campo
});

// Quando foca na senha, o guaxinim desvia o olhar
senhaInput.addEventListener('focus', () => {
    trocarOlho("olho6"); // Olho desviado
});

senhaInput.addEventListener('blur', () => {
    trocarOlho("guaxinim"); // Volta ao normal
});

// Função de piscada automática
let piscando = false;
setInterval(() => {
    if (!piscando) {
        piscando = true;
        const imagemAtual = olhos.src;

        // Verifica se ele está com olhar desviado (olho6)
        if (imagemAtual.includes("olho6.jpeg")) {
            trocarOlho("pisca2");
        } else {
            trocarOlho("pisca");
        }
        // Depois de 200ms, volta para o olho anterior
        setTimeout(() => {
            olhos.src = imagemAtual;
            piscando = false;
        }, 200);
    }
}, 4000); // Pisca a cada 4 segundos