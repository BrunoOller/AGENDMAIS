window.addEventListener('DOMContentLoaded', () => {
    // Seleciona o input de data
    const inputData = document.getElementById('data-agendamento');

    // Cria um objeto de data para o dia de hoje
    const hoje = new Date();

    // Formata a data de hoje para o formato AAAA-MM-DD, que é o que o input[type=date] entende
    // 1. Pega o ano: hoje.getFullYear() -> 2025
    // 2. Pega o mês: hoje.getMonth() + 1 -> (Novembro é 10, então +1 = 11). Adiciona um '0' na frente se for menor que 10.
    // 3. Pega o dia: hoje.getDate() -> 10. Adiciona um '0' na frente se for menor que 10.
    const ano = hoje.getFullYear();
    const mes = String(hoje.getMonth() + 1).padStart(2, '0'); // Garante dois dígitos, ex: 09
    const dia = String(hoje.getDate()).padStart(2, '0');    // Garante dois dígitos, ex: 05

    const dataMinima = `${ano}-${mes}-${dia}`; // Resultado: "2025-11-10"

    // Define o atributo 'min' do input de data.
    // Isso impede o navegador de permitir a seleção de qualquer data anterior a hoje.
    inputData.min = dataMinima;
});