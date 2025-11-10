
// 1. Armazenar os dados das unidades (endereços)
const dadosUnidades = {
    barra_bonita: {
        endereco: "Rua Principal, 123 - Centro, Sua Cidade - CEP: 12345-678"
    },
    bariri: {
        endereco: "Avenida Norte, 456 - Bairro Norte, Sua Cidade - CEP: 98765-432"
    },
    jau: {
        endereco: "Avenida Norte, 456 - Bairro Norte, Sua Cidade - CEP: 98765-432"
    }
};

// 2. Pegar os elementos HTML que vamos manipular
const selectUnidade = document.getElementById('select-unidade');
const infoUnidadeContainer = document.getElementById('info-unidade');
const infoEndereco = document.getElementById('info-endereco');

// 3. Adicionar um "ouvinte de eventos" para o select de unidades
selectUnidade.addEventListener('change', function() {
    // Pega o valor da opção selecionada (ex: "unidade_centro")
    const unidadeSelecionada = this.value;

    // Verifica se o valor selecionado existe nos nossos dados
    if (dadosUnidades[unidadeSelecionada]) {
        const dados = dadosUnidades[unidadeSelecionada];

        // Atualiza o texto do parágrafo com o endereço
        infoEndereco.textContent = dados.endereco;

        // Mostra o contêiner de informações da unidade
        infoUnidadeContainer.style.display = 'block';
    } else {
        // Se o usuário selecionar a opção "Clique para selecionar", esconde o contêiner
        infoUnidadeContainer.style.display = 'none';
    }
});