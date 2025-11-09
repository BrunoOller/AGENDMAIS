const dadosExame = {
    tomografia: {
        titulo: "Tomografia Computadorizada (TC)",
        descricao: "A TC odontológica oferece imagens 3D detalhadas dos ossos maxilares, dentes e estruturas adjacentes, sendo crucial para o planejamento de implantes e cirurgias.",
        imagemUrl: "/wwwroot/img/agendamentoIMG/tooth.png"
    },
    panoramica: {
        titulo: "Radiografia Panorâmica",
        descricao: "Uma visão geral de todos os dentes, maxilares e articulações. É um exame fundamental para avaliações ortodônticas e identificação de problemas gerais.",
        imagemUrl: "/wwwroot/img/agendamentoIMG/tooth.png"
    },
    periapical: {
        titulo: "Radiografia Periapical",
        descricao: "Mostra o dente inteiro, da coroa à raiz. Ideal para detectar cáries, problemas na raiz e na estrutura óssea ao redor do dente.",
        imagemUrl: "/wwwroot/img/agendamentoIMG/tooth.png"
    }
}

const selectExame = document.getElementById("select-exame");
const infoContainer = document.getElementById("info-exam");
const infoTitulo = document.getElementById("info-title");
const infoImagem = document.getElementById("info-image");
const infoDescricao = document.getElementById("info-desc");

selectExame.addEventListener('change', function () {
    const exameSelecionado = this.value;

    if (dadosExame[exameSelecionado]) {
        const dados = dadosExame[exameSelecionado];

        infoTitulo.textContent = dados.titulo;
        infoImagem.src = dados.imagemUrl;
        infoImagem.alt = `Imagem do exame ${dados.titulo}`;
        infoDescricao.textContent = dados.descricao;

        infoContainer.style.display = 'block';
    } else {
        infoContainer.style.display = 'none';
    }
});