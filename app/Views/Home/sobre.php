<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGEND+ - Sistema de Agendamento de Saúde</title>

    <!-- Link Favicon -->
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>app/wwwroot/img/agendm-fav.svg" type="image/x-icon">

    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <!-- Links CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/reset.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/color.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/Home/aboutStyle.css?v=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/globalStyle.css">

    <!-- Link Fontawesome -->
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v7.1.0/css/all.css">
</head>

<body>
    <?php include 'app/Views/Layout/header.php'; ?>

    <!-- Bem-Vindo -->
    <section class="bemvindo">
        <div class="box">
            <h1>BEM VINDO(A) AO AGEND+</h1>
            <p>Agende seus exames de radiologia odontológica na Massucato de forma rápida e totalmente online.
                Escolha a unidade, selecione o exame e finalize seu agendamento em poucos cliques.</p>
        </div>
    </section>

    <!-- Cards do sobre -->
    <section class="sobreCardCima">
        <!-- Agendamento Online -->
        <div class="sc-content">
            <div class="cardCima">
                <h2>AGENDAMENTOS ONLINE</h2>
                <p>Evite ligações e espera! Agende seus exames odontológicos na unidade Massucato de sua escolha,
                    no melhor horário para você.
                <p>
            </div>

            <!-- SERVIÇOS DISPONÍVEIS -->
            <div class="cardCima">
                <h2>EXAMES DISPONÍVEIS</h2>
                <div class="textos">
                    <ul>
                        <li>Raio-X Odontológico</li>
                        <li>Radiografia Panorâmica</li>
                        <li>Cefalometria</li>
                        <li>Tomografia Computadorizada</li>
                    </ul>
                    <p>(Exames podem variar conforme a unidade)</p>
                </div>
            </div>


            <!-- ENCONTRE O POSTO MAIS PRÓXIMO -->
            <div class="cardCima">
                <h2>UNIDADES MASSUCATO</h2>
                <p>Escolha entre nossas unidades em Barra Bonita, Jaú e Bariri. Veja os horários disponíveis
                    e agende sem complicação.
                <p>
            </div>
        </div>
    </section>

    <section class="sobreCardBaixo">
        <div class="sb-content">
            <!-- COMO FUNCIONA? -->
            <div class="cardBaixo">
                <h2>COMO FUNCIONA?</h2>
                <ul>
                    <li>1 - Crie sua conta ou faça login</li>
                    <li>2 - Escolha o exame desejado</li>
                    <li>3 - Selecione a unidade (Barra Bonita, Jaú ou Bariri)</li>
                    <li>4 - Escolha a data e horário</li>
                    <li>5 - Confirme seu agendamento</li>
                </ul>
            </div>

            <!-- Linha -->
            <div class="line"></div>

            <div class="cardBaixo">
                <h2>SEGURANÇA DOS DADOS</h2>
                <p>Seu agendamento e suas informações pessoais são protegidos por protocolos de segurança avançados,
                    garantindo privacidade e confiabilidade em todo o processo.</p>
            </div>
        </div>
    </section>

    <!-- SERVIÇOS DISPONÍVEIS -->

    <!-- Imagem que fica no meio da tela -->
    <div class="imgPag">
        <img src="<?php echo BASE_URL; ?>app/wwwroot/img/about-us/banner-about.png" alt="">
    </div>

    <section class="lineHor">
        <div class="hor"></div>
    </section>

    <!-- Mais texto da parte do sobre, abaixo da imagem -->
    <div class="t-sobrenos">
        <div class="box">
            <div class="sobrenos">
                <!-- Sobre nós -->
                <h2 class="title-sn">Sobre Nós</h2>
                <p class="text-sn">O AGEND+ é o sistema oficial de agendamentos da Radiologia Odontológica Massucato, desenvolvido para
                    facilitar e modernizar a forma como pacientes agendam seus exames. Criado em 2025, o sistema foi pensado
                    para oferecer praticidade, rapidez e transparência no processo de agendamento, conectando pacientes
                    às unidades de Barra Bonita, Jaú e Bariri de maneira simples e eficiente.
                    <br><br>
                    Nosso objetivo é tornar o acesso aos exames odontológicos mais organizado e acessível, garantindo uma
                    experiência digital fluida desde a escolha do exame até a chegada na clínica.
                </p>
            </div>
        </div>
    </div>

    <div class="t-nossocompro">
        <div class="nbox">
            <div class="nossocompro">
                <!-- Nosso Compromisso -->
                <h2 class="title-nc">Nosso Compromisso</h2>
                <p class="text-nc">Trabalhamos para tornar o agendamento de exames odontológicos mais rápido, moderno e confiável.
                    Acreditamos que a tecnologia deve simplificar a vida das pessoas — por isso criamos um sistema onde
                    cada etapa é intuitiva e segura.
                    <br><br>
                    Estamos em constante evolução, sempre ouvindo nossos usuários e aprimorando o AGEND+. Nosso propósito
                    é oferecer a melhor experiência possível para quem depende de exames precisos e profissionais de excelência.
                </p>
            </div>
        </div>
    </div>

    <!-- Nossa Equipe -->
    <section id="nossaEquipe">
        <div class="title-ne">
            <h1>Nossa Equipe</h1>
        </div>
        <div class="equipe">
            <div class="fotosquipe">
                <div class="exibicao">
                    <img src="<?php echo BASE_URL; ?>app/wwwroot/img/about-us/bruno.png" alt="">
                    <div class="links">
                        <a href=""><i class="fa-brands fa-linkedin"></i></a>
                        <a href=""><i class="fa-brands fa-github"></i></a>
                    </div>
                </div>
                <p>Bruno Oller Brunelli</p>
            </div>

            <div class="fotosquipe">
                <div class="exibicao">
                    <img src="<?php echo BASE_URL; ?>app/wwwroot/img/about-us/surita.png" alt="Icone de atividade">
                    <div class="links">
                        <a href=""><i class="fa-brands fa-linkedin"></i></a>
                        <a href=""><i class="fa-brands fa-github"></i></a>
                    </div>
                </div>
                <p>João Pedro Surita</p>
            </div>

            <div class="fotosquipe">
                <div class="exibicao">
                    <img src="<?php echo BASE_URL; ?>app/wwwroot/img/about-us/doa.png" alt="Icone de atividade">
                    <div class="links">
                        <a href=""><i class="fa-brands fa-linkedin"></i></a>
                        <a href=""><i class="fa-brands fa-github"></i></a>
                    </div>
                </div>
                <p>Eduardo Petarnella Gabri</p>
            </div>
        </div>
    </section>

    <footer id="footer">
        <div class="container f-content">
            <h2 id="copy"><span>&copy; 2025 AGEND+</span> Sistema de Agendamento de Radiologia Odontologica - Todos os direitos
                reservados.</h2>
            <div class="links">
                <a href="index.php?controller=Home&action=politicas">Política de Privacidade</a>
                <div class="line"></div>
                <a href="index.php?controller=Home&action=termos">Termos de Uso</a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>