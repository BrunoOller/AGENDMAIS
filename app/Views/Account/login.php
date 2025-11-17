<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título do Site -->
    <title>AGENDMAIS - Login</title>

    <!-- Link Favicon -->
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>app/wwwroot/img/agendm-fav.svg" type="image/x-icon">

    <!-- Links CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/color.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/reset.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/Account/loginStyle.css">

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
            <h1>LOGIN</h1>
            <span>...</span>
        </div>
    </section>

    <section id="content">
        <form action="index.php?controller=Login&action=autenticar" method="POST">
            <div class="f-nome">
                <label for="email">E-mail<span class="required">*</span></label>
                <input type="text" placeholder="" name="email" id="email">
            </div>
            <div class="f-sen">
                <label for="senha">Senha<span class="required">*</span></label>
                <input type="password" placeholder="" name="senha" id="senha">
            </div>

            <div class="btn"><button type="submit">Entrar</button></div>
        </form>

        <?php if ($msg === 'erro'): ?>
            <p class="text-danger" style="text-align: center; color: red;">E-mail ou senha inválidos. Tente novamente.</p>
        <?php endif; ?>
        <?php if ($msg === 'erro_campos'): ?>
            <p class="text-danger" style="text-align: center; color: red;">Preencha todos os campos.</p>
        <?php endif; ?>
        <?php if ($msg === 'sucesso'): ?>
            <p class="text-success" style="text-align: center; color: green;">Cadastro realizado! Faça login.</p>
        <?php endif; ?>

        <div class="agree">
            <input type="checkbox" name="check" id="check">
            <p>Concordo com os <a href="index.php?controller=Home&action=termos">Termos de Uso</a>, e com as <a
                    href="index.php?controller=Home&action=politicas">Políticas de Privacidade</a>.</p>
        </div>

        <div class="btn"><a href="/Views/Home/index.html">Entrar</a></div>

        <div class="haveAccount">
            <p>Não possui uma conta? <a href="index.php?controller=Login&action=registrarIndex">Criar</a></p>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="<?php echo BASE_URL; ?>/wwwroot/js/script.js"></script>
</body>

</html>