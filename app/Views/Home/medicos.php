<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título do site -->
    <title>AGENDMAIS - Sistema de Agendamento de Saúde</title>

    <!-- Link Favicon -->
    <link rel="shortcut icon" href="/wwwroot/img/agendm-fav.svg" type="image/x-icon">

    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <!-- Links CSS -->
    <link rel="stylesheet" href="/wwwroot/css/reset.css">
    <link rel="stylesheet" href="/wwwroot/css/color.css">
    <link rel="stylesheet" href="/wwwroot/css/Home/medicosStyle.css">
    <link rel="stylesheet" href="/wwwroot/css/globalStyle.css">

    <!-- Link Fontawesome -->
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v6.7.2/css/all.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid px-5">
            <a class="navbar-brand" href="#">
                <img src="/wwwroot/img/logo.svg" id="logo">
            </a>

            <!-- Botão para mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">              
                    <li class="nav-item">
                        <a class="nav-link" href="/Views/Account/login.html">LogOut</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="s-editInfos">
        <h1>Editar Informações importantes</h1>
        <div class="container ei-content">
            <div class="ei-01">
                <div class="ei-dados">
                    <div id="telefone" class="info">
                        <label for="d-tel">Telefone*</label>
                        <input type="" placeholder="Ex: 14999999999" value="14990987677" name="tel" id="d-tel">
                    </div>
                    <div id="esp" class="info">
                        <label for="i-dropdown">Especialidade*</label>
                        <select id="i-dropdown">
                            <option value="0" disabled selected>Clique para selecionar</option>
                            <option value="1">Clínico Geral</option>
                            <option value="2">Odontologia</option>
                            <option value="3">Ginecologia</option>
                            <option value="4">Geriatria</option>
                            <option value="5">Psiquiatria</option>
                            <option value="6">Pediatria</option>
                        </select>
                    </div>
                    <div id="posto" class="info">
                        <label for="pa">Posto de Saúde Associado<span class="required">*</span></label>
                        <select id="pa">
                            <option value="0" disabled selected>Clique para selecionar</option>
                            <option value="1">UBS Dr. Moacir Barreto</option>
                            <option value="2">UBS Dr. Ângelo de Biaggi</option>
                            <option value="3">UBS Dr. Mário Covas</option>
                            <option value="4">UBS Dr. Raul Silva</option>
                            <option value="5">UBS Dr. Edgard Silveira</option>
                            <option value="6">UBS Dr. Nelson Barbieri</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="ei-02">
                <img src="/wwwroot/img/fotos-perfil/3.png" alt="Foto de perfil">
                <h2>Foto de Perfil</h2>
            </div>
        </div>
    </section>

    <section id="s-solicitations">
        <h1>Informações dos Agendamentos</h1>
        <div class="container s-content">
            <div class="block">
                <div class="b-header">
                    <h2><span>Paciente:</span> João da Silva</h2>
                </div>
                <div class="b-info">
                    <div class="i-image">
                        <div class="line"></div>
                        <img src="/wwwroot/img/fotos-perfil/1.png" alt="Foto de perfil" id="foto-usuario">
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
                    <h2><span>Paciente:</span> Claudete Cristina</h2>
                </div>
                <div class="b-info">
                    <div class="i-image">
                        <div class="line"></div>
                        <img src="/wwwroot/img/fotos-perfil/2.png" alt="Foto de perfil" id="foto-usuario">
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
                    <h2><span>Paciente:</span> Carlos dos Santos</h2>
                </div>
                <div class="b-info">
                    <div class="i-image">
                        <div class="line"></div>
                        <img src="/wwwroot/img/fotos-perfil/3.png" alt="Foto de perfil" id="foto-usuario">
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