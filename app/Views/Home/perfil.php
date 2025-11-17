<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título do site -->
    <title>AGENDMAIS - Perfil</title>

    <!-- Link Favicon -->
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>app/wwwroot/img/agendm-fav.svg" type="image/x-icon">

    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <!-- Links CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/reset.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/color.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/Home/perfilStyle.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/globalStyle.css">

    <!-- Link Fontawesome -->
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v6.7.2/css/all.css">
</head>

<body>
    <?php include 'app/Views/Layout/header.php'; ?>

    <section id="foto-perfil">
        <h1>Seu perfil</h1>
        <img src="<?php echo BASE_URL; ?>app/wwwroot/img/fotos-perfil/3.png" alt="Foto de Perfil" id="foto">
    </section>

    <section id="infos-perfil">
        <div class="container ip-content">
            <h2>Suas informações:</h2>
            <div class="ip-dados">
                <div id="nome" class="info">
                    <label for="d-name">Nome*</label>
                    <input type="text" value="Carlos dos Santos" name="name" id="d-name">
                </div>
                <div id="telefone" class="info">
                    <label for="d-tel">Telefone*</label>
                    <input type="tel" value="(xx) xxxxx-xxxx" name="tel" id="d-tel">
                </div>
                <div id="datanasc" class="info">
                    <label for="d-date">Data de Nascimento*</label>
                    <input type="date" value="1992-06-17" name="date" id="d-date">
                </div>
                <div id="senha" class="info">
                    <label for="d-password">Senha*</label>
                    <div class="senha-input">
                        <div class="input">
                            <input type="password" value="12345678" name="password" id="d-password">
                            <i class="fa-solid fa-eye-slash"></i>
                        </div>
                        <button>Alterar senha</button>
                    </div>
                </div>
                <div id="usucpf" class="info">
                    <label for="d-cpf">CPF*</label>
                    <input type="text" value="000.000.000-00" name="cpf" id="d-cpf">
                </div>
                <div id="e-mail" class="info">
                    <label for="d-email">E-mail*</label>
                    <input type="email" value="xxxxxxxx@gmail.com" name="email" id="d-email">
                </div>
            </div>
        </div>
    </section>

    <section id="appointmentHistory">
        <h1>Histórico de Agendamentos</h1>
        <div class="container ah-content">
            <div class="block">
                <div class="b-header">
                    <h2><span>Agendamento #</span>001</h2>
                    <div class="status">
                        <h2>Status: <span class="badge text-bg-warning">Pendente</span></h2>
                    </div>
                </div>
                <div class="b-info">
                    <div class="i-image">
                        <div class="line"></div>
                        <img src="/wwwroot/img/fotos-perfil/appointmentHistory.png" alt="Foto de Agendamento Médico" id="foto">
                    </div>
                    <div class="i-infos">
                        <ul>
                            <li><span id="emphasis">CPF:</span> xxx.xxx.xxx-XX</li>
                            <li><span id="emphasis">Horário escolhido:</span> 09:45</li>
                            <li><span id="emphasis">Dia da consulta:</span> xx/xx/xxxx</li>
                            <li><span id="emphasis">Consulta de:</span> <br> <span id="exam">XXXX</span></li>
                        </ul>
                    </div>
                    <div class="i-desc">
                        <label for="text">Descrição os sintomas:</label>
                        <textarea name="text" id="d-text"></textarea>
                    </div>
                </div>
            </div>

            <div class="block">
                <div class="b-header">
                    <h2><span>Agendamento #</span>002</h2>
                    <div class="status">
                        <h2>Status: <span class="badge text-bg-success">Realizada</span></h2>
                    </div>
                </div>
                <div class="b-info">
                    <div class="i-image">
                        <div class="line"></div>
                        <img src="<?php echo BASE_URL; ?>app/wwwroot/img/fotos-perfil/appointmentHistory.png" alt="Foto de Agendamento Médico" id="foto">
                    </div>
                    <div class="i-infos">
                        <ul>
                            <li><span id="emphasis">CPF:</span> xxx.xxx.xxx-XX</li>
                            <li><span id="emphasis">Horário escolhido:</span> 09:45</li>
                            <li><span id="emphasis">Dia da consulta:</span> xx/xx/xxxx</li>
                            <li><span id="emphasis">Consulta de:</span> <br> <span id="exam">XXXX</span></li>
                        </ul>
                    </div>
                    <div class="i-desc">
                        <label for="text">Descrição os sintomas:</label>
                        <textarea name="text" id="d-text"></textarea>
                    </div>
                </div>
            </div>

            <div class="block">
                <div class="b-header">
                    <h2><span>Agendamento #</span>003</h2>
                    <div class="status">
                        <h2>Status: <span class="badge text-bg-success">Realizada</span></h2>
                    </div>
                </div>
                <div class="b-info">
                    <div class="i-image">
                        <div class="line"></div>
                        <img src="<?php echo BASE_URL; ?>app/wwwroot/img/fotos-perfil/appointmentHistory.png" alt="Foto de Agendamento Médico" id="foto">
                    </div>
                    <div class="i-infos">
                        <ul>
                            <li><span id="emphasis">CPF:</span> xxx.xxx.xxx-XX</li>
                            <li><span id="emphasis">Horário escolhido:</span> 09:45</li>
                            <li><span id="emphasis">Dia da consulta:</span> xx/xx/xxxx</li>
                            <li><span id="emphasis">Consulta de:</span> <br> <span id="exam">XXXX</span></li>
                        </ul>
                    </div>
                    <div class="i-desc">
                        <label for="text">Descrição os sintomas:</label>
                        <textarea name="text" id="d-text"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <button id="see-more">Ver mais</button>
    </section>

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