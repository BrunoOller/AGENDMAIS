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

    <!-- Links Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

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
        </div>
    </section>

    <section id="content">
        <?php if ($msg === 'erro_db'): ?>
            <div class="alert alert-danger" role="alert">
                Erro ao cadastrar. O e-mail ou CPF já pode estar em uso.
            </div>
        <?php endif; ?>

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
            </div>
            <div class="f-btn">
                <div class="button-s">
                    <button type="submit">Cadastrar</button>
                </div>
            </div>
        </form>

        <div class="agree">
            <input type="checkbox" name="check" id="check">
            <p>Concordo com os <a href="index.php?controller=Home&action=termos">Termos de Uso</a>, e com as <a
                    href="index.php?controller=Home&action=politicas">Políticas de Privacidade</a>.</p>
        </div>

        <div class="s-line">
            <div class="line"></div>
        </div>

        <div class="haveAccount">
            <p>Já possui uma conta? <a href="index.php?controller=Login&action=index">Entrar</a></p>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>