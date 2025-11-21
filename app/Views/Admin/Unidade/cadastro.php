<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AGENDMAIS - Cadastro de Unidade</title>

    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>app/wwwroot/img/agendm-fav.svg" type="image/x-icon">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/color.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/reset.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/Account/registerStyle.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="//use.fontawesome.com/releases/v6.7.2/css/all.css">
</head>

<body>
    <a class="btn-voltar" href="index.php?controller=Admin&action=dashboard">
        <i class="fa-solid fa-arrow-left"></i>
    </a>

    <header id="h-cadastro">
        <img src="<?php echo BASE_URL; ?>app/wwwroot/img/logo.svg" alt="Logo AGEND+" id="logo">
    </header>

    <section id="h-content">
        <div class="line"></div>
        <div class="text">
            <h1>CADASTRO DE UNIDADE</h1>
        </div>
    </section>

    <section id="content">

        <?php
        if (isset($msg) && $msg === 'sucesso'): // Verifica a mensagem 'sucesso'
        ?>
            <div class="alert alert-success" style="width: 42.5%;" role="alert">
                Sucesso! Unidade e Monitor cadastrados com êxito.
            </div>
        <?php elseif (isset($msg) && strpos($msg, 'erro') !== false): // Captura os diversos erros (erro_usuario, erro_unidade) 
        ?>
            <div class="alert alert-danger" style="width: 42.5%;" role="alert">
                Erro ao cadastrar. Verifique os dados e tente novamente.
            </div>
        <?php endif; ?>

        <form action="index.php?controller=Admin&action=cadastrarUnidade" method="POST">

            <h3 class="w-100 text-center mb-4" style="font-size: 1.15rem; font-weight: 700;">Dados da Unidade</h3>

            <div class="f-nome">
                <label for="uni_nome">Nome da Unidade<span class="required">*</span></label>
                <input type="text" placeholder="Ex: Clínica Odontológica" name="uni_nome" id="uni_nome" required>
            </div>

            <div class="f-email"> <label for="uni_endereco">Endereço Completo<span class="required">*</span></label>
                <input type="text" placeholder="Rua, Número, Bairro, Cidade" name="uni_endereco" id="uni_endereco" required>
            </div>

            <div class="f-tel">
                <label for="uni_telefone">Telefone<span class="required">*</span></label>
                <input type="tel" placeholder="Ex: 14999999999" name="uni_telefone" id="uni_telefone" maxlength="11" required>
            </div>

            <div class="s-line my-4">
                <div class="line" style="width: 25rem; background-color: #585858;"></div>
            </div>

            <h3 class="w-100 text-center mb-4" style="font-size: 1.15rem; font-weight: 700;">Dados do Usuário Monitor</h3>

            <div class="f-nome">
                <label for="usu_nome">Nome Completo do Monitor<span class="required">*</span></label>
                <input type="text" placeholder="" name="usu_nome" id="usu_nome" required>
            </div>

            <div class="f-cpf">
                <label for="usu_cpf">CPF<span class="required">*</span></label>
                <input type="number" placeholder="Ex: 10020030040" name="usu_cpf" id="usu_cpf" maxlength="11" required>
            </div>

            <div class="f-data"> <label for="usu_email">E-mail (Login)<span class="required">*</span></label>
                <input type="email" placeholder="E-mail de acesso" name="usu_email" id="usu_email" required>
            </div>

            <div class="f-sen"> <label for="usu_senha">Senha Inicial<span class="required">*</span></label>
                <input type="password" placeholder="" name="usu_senha" id="usu_senha" required>
            </div>

            <div class="f-conf"> <label for="usu_conf">Confirmar Senha<span class="required">*</span></label>
                <input type="password" placeholder="" name="usu_conf" id="usu_conf" required>
            </div>

            <div class="f-btn mt-4">
                <div class="button-s">
                    <button type="submit">Cadastrar Unidade</button>
                </div>
            </div>
        </form>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>