<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título do Site -->
    <title>AGENDMAIS - Sistema de Agendamento de Saúde</title>

    <!-- Link Favicon -->
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>app/wwwroot/img/agendm-fav.svg" type="image/x-icon">

    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <!-- Links CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/reset.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/color.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/globalStyle.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/Admin/dashboard.css">

    <!-- Link Fontawesome -->
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v6.7.2/css/all.css">
</head>

<body>
    <main>
        <section class="a-header">
            <a href="index.php?controller=Home&action=index">
                <img class="logo" src="<?php echo BASE_URL; ?>app/wwwroot/img/logo-full-white.svg" alt="logo">
            </a>
            <div class="h-admin">
                <p>Olá, ADMIN!</p>
                <div class="circle"></div>
            </div>
        </section>

        <section class="offcanva">
            <div class="a-options">
                <div class="profile">
                    <div class="a-profile">
                        <div class="a-photo">
                        </div>
                        <h3>ADMINISTRADOR</h3>
                    </div>
                </div>
                <div class="a-nav">
                    <ul>
                        <li><a href="#"><i class="fa-solid fa-chart-pie"></i> Dashboard</a></li>
                        <li><a href="index.php?controller=Admin&action=cadastrarUnidadeIndex"><i class="fa-solid fa-chart-simple"></i> Cadastrar Unidade</a></li>
                        <!--<li><a href="./a-solicitacoes.html"><i class="fa-solid fa-bell"></i> Solicitações de cadastro</a></li>
                        <li><a href="./a-usuarios.html"><i class="fa-solid fa-person"></i> Usuários</a></li>-->
                    </ul>
                </div>
            </div>
        </section>

        <div class="general">
            <!-- Barrinha que fica na lateral da tela -->
            <div class="fundo-offcanva"></div>


            <section class="a-infos">
                <div class="a-container">
                    <!-- Número de Usuários no Sistema -->
                    <div class="accesses">
                        <div class="duo">
                            <img src="<?php echo BASE_URL; ?>app/wwwroot/img/admin/person.svg" alt="Ícone de Pessoa">
                            <p>Usuários</p>
                        </div>
                        <p class="number">1.025</p>
                    </div>
                    <!-- Número de Agendamentos no Sistema -->
                    <div class="accesses">
                        <div class="duo">
                            <img src="<?php echo BASE_URL; ?>app/wwwroot/img/admin/sino.svg" alt="Ícone de Sino">
                            <p>Agendamentos</p>
                        </div>
                        <p class="number">3.574</p>
                    </div>
                </div>
            </section>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
            crossorigin="anonymous"></script>
    </main>
</body>

</html>