// Executa o código assim que a página terminar de carregar
window.addEventListener('DOMContentLoaded', () => {
    // 1. Pega os parâmetros da URL atual
    const urlParams = new URLSearchParams(window.location.search);

    // 2. Procura pelo parâmetro específico que chamamos de 'exame'
    const examePreSelecionado = urlParams.get('exame');

    // 3. Se o parâmetro 'exame' existir na URL...
    if (examePreSelecionado) {
        // Encontra o <select> de exames no documento
        const selectExame = document.getElementById('select-exame');

        // Define o valor do <select> para ser o valor que veio da URL
        selectExame.value = examePreSelecionado;

        // 4. (BÔNUS) Dispara o evento 'change' manualmente
        // Isso faz com que o nosso outro script (que mostra a imagem) seja executado,
        // como se o usuário tivesse acabado de selecionar a opção.
        const changeEvent = new Event('change');
        selectExame.dispatchEvent(changeEvent);
    }
});