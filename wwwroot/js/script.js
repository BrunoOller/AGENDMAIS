$('#cep').on('blur', function () {
    let cep = $('#cep').val().replace(/\D/g, '');

    if (cep.length == 8) {
        $.ajax({
            url: `https://viacep.com.br/ws/${cep}/json/`,
            type: 'GET',
            dataType: 'json',
            success: function (retorno) {
                if (retorno.erro) {
                    alert('CEP não encontrado!');
                } else {
                    $('#rua').val(retorno.logradouro);
                    $('#bairro').val(retorno.bairro);
                    $('#cidade').val(retorno.localidade);
                    $('#estado').val(retorno.uf);
                    // todos os outros campos...
                }
            },
            error: function () { }
        });
    } else {
        alert('Digita o CEP corretamente!');
    }
});