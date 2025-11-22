<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título do site -->
    <title>AGENDMAIS - Fale conosco</title>

    <!-- Link Favicon -->
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>app/wwwroot/img/agendm-fav.svg" type="image/x-icon">

    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <!-- Links CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/reset.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/color.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/Home/contatoStyle.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/globalStyle.css">

    <!-- Link Fontawesome -->
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v6.7.2/css/all.css">
</head>

<body>
    <!--<nav class="navbar navbar-expand-lg">
        <div class="container-fluid px-5">
            <a class="navbar-brand" href="./index.html">
                <img src="<?php //echo BASE_URL; ?>app/wwwroot/img/logo.svg" id="logo">
            </a>

            <!-- Botão para mobile -->
            <!--<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php?controller=Home&action=sobre">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Views/Account/login.html">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>-->
    <?php include 'app/Views/Layout/header.php'; ?>

    <main>
        <div class="c-content">
            <div class="fale-conosco">
                <h1 id="title-fc">Fale Conosco!</h1>
                <p id="text-fc"> A sua saúde é a nossa prioridade. Se você precisa de ajuda com o agendamento de
                    consultas, tem dúvidas sobre o funcionamento do sistema ou deseja enviar sugestões para melhorar
                    nossos serviços, estamos aqui para ouvir você.</p>
                <div class="input-container">
                    <i class="fa-solid fa-envelope"></i>
                    <div class="line"></div>
                    <input type="text" readonly value="suporte@agendmais.com">
                </div>
            </div>

            <form class="form" method="post">
                <div>
                    <input type="text" id="nome" placeholder="Nome*" />
                </div>
                <div>
                    <input type="email" id="email" placeholder="Endereço de Email*" />
                </div>
                <div>
                    <textarea id="msg" placeholder="Como podemos ajudar?"></textarea>
                </div>

                <div class="button">
                    <button type="reset">Enviar</button>
                </div>
            </form>
        </div>
    </main>

    <footer id="footer">
        <div class="container f-content">
            <h2 id="copy"><span>&copy; 2025 AGEND+</span> Sistema de Agendamento de Saúde - Todos os direitos
                reservados.</h2>
            <div class="links">
                <a href="./politicas.html">Política de Privacidade</a>
                <div class="line"></div>
                <a href="./termos.html">Termos de Uso</a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>