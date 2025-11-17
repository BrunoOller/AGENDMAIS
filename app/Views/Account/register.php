<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título do Site -->
    <title>AGENDMAIS - Cadastro</title>

    <!-- Link Favicon -->
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>app/wwwroot/img/agendm-fav.svg" type="image/x-icon">

    <!-- Links CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/color.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/reset.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/Account/registerStyle.css">

    <!-- Link Fontawesome -->
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v6.7.2/css/all.css">
</head>

<body>
    <a class="btn-voltar" href="index.php?controller=Home&action=index">
        <i class="fa-solid fa-arrow-left"></i>
    </a>

    <header id="h-cadastro">
        <img src="<?php echo BASE_URL; ?>app/wwwroot/img/logo.svg" alt="Logo AGEND+" id="logo">
    </header>

    <section id="h-content">
        <div class="line"></div>
        <div class="text">
            <h1>CADASTRO</h1>
            <span>...</span>
        </div>
    </section>

    <section id="content">
        <form action="index.php?controller=Login&action=registrar" method="POST">
            <div class="f-nome">
                <label for="nome">Nome Completo<span class="required">*</span></label>
                <input type="text" placeholder="" name="nome" id="nome">
            </div>
            <div class="f-email">
                <label for="email">E-mail<span class="required">*</span></label>
                <input type="email" placeholder="Ex: nomeexemplo@gmail.com" name="email" id="email">
            </div>
            <div class="f-data">
                <label for="data">Data de Nascimento<span class="required">*</span></label>
                <input type="date" name="data" id="data">
            </div>
            <div class="f-cpf">
                <label for="cpf">CPF<span class="required">*</span></label>
                <input type="number" placeholder="Ex: 10020030040" name="cpf" id="cpf">
            </div>
            <div class="f-tel">
                <label for="tel">Telefone<span class="required">*</span></label>
                <input type="tel" placeholder="Ex: 14999999999" name="tel" id="tel">
            </div>
            <div class="f-sen">
                <label for="senha">Senha<span class="required">*</span></label>
                <input type="password" placeholder="" name="senha" id="senha">
            </div>
            <div class="f-conf">
                <label for="conf">Confirmar Senha<span class="required">*</span></label>
                <input type="password" placeholder="" name="conf" id="conf">

                <div class="btn">
                    <button type="submit">Cadastrar</button>
                </div>
            </div>
        </form>

        <?php if ($msg === 'erro_db'): ?>
            <p class="text-danger" style="text-align: center; color: red;">
                Erro ao cadastrar. O e-mail ou CPF já pode estar em uso.
            </p>
        <?php endif; ?>

        <div class="agree">
            <input type="checkbox" name="check" id="check">
            <p>Concordo com os <a href="index.php?controller=Home&action=termos">Termos de Uso</a>, e com as <a
                    href="index.php?controller=Home&action=politicas">Políticas de Privacidade</a>.</p>
        </div>

        <div class="haveAccount">
            <p>Já possui uma conta? <a href="index.php?controller=Login&action=index">Entrar</a></p>
        </div>
    </section>
</body>

</html>