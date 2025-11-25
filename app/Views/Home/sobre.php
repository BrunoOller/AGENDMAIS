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
            <p>Agende seus exames de radiologia odontológica de forma rápida, prática e totalmente online. Aqui você encontra horários disponíveis, escolhe a unidade de sua preferência e realiza seu agendamento em poucos minutos.</p>
        </div>
    </section>

    <!-- Cards do sobre -->
    <section class="sobreCardCima">
        <!-- Agendamento Online -->
        <div class="sc-content">
            <div class="cardCima">
                <h2>AGENDAMENTOS ONLINE</h2>
                <p>Evite ligações e esperas desnecessárias! Selecione o exame odontológico desejado, escolha a clínica e garanta seu horário com apenas alguns cliques.
                <p>
            </div>

            <!-- SERVIÇOS DISPONÍVEIS -->
            <div class="cardCima">
                <h2>SERVIÇOS DISPONÍVEIS</h2>
                <div class="textos">
                    <ul>
                        <li>Radiografia Periapical</li>
                        <li>Radiografia Panorâmica</li>
                        <li>Telerradiografia</li>
                        <li>Tomografia Odontológica (CBCT)</li>
                    </ul>
                    <p>(Serviços disponíveis podem variar conforme a clínica)</p>
                </div>
            </div>


            <!-- ENCONTRE O POSTO MAIS PRÓXIMO -->
            <div class="cardCima">
                <h2>EXAMES COM QUALIDADE E PRECISÃO</h2>
                <p>As clínicas parceiras utilizam equipamentos modernos e técnicas seguras para garantir imagens nítidas e resultados confiáveis para o seu tratamento odontológico.</p>
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
                    <li>2 - Escolha o exame odontológico e a clínica</li>
                    <li>3 - Selecione a data e o horário disponíveis</li>
                    <li>4 - Confirme seu agendamento e pronto!</li>
                </ul>
            </div>

            <!-- Linha -->
            <div class="line"></div>

            <div class="cardBaixo">
                <h2>SEGURANÇA E PRIVACIDADE</h2>
                <p>Seus dados estão protegidos. Utilizamos protocolos modernos de segurança para garantir a privacidade das suas informações e a integridade dos seus agendamentos.</p>
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
                <p class="text-sn">O AGEND+ é um sistema criado para facilitar o agendamento de exames de radiologia odontológica em clínicas especializadas.
                    Nossa missão é tornar o processo de marcação mais simples, rápido e acessível, garantindo ao paciente uma experiência prática desde o primeiro contato.
                    <br><br>
                    Com foco em modernidade e eficiência, o AGEND+ conecta pacientes a unidades de radiologia de forma descomplicada, oferecendo informações claras, horários disponíveis e confirmação instantânea.
                </p>
            </div>
        </div>
    </div>

    <div class="t-nossocompro">
        <div class="nbox">
            <div class="nossocompro">
                <!-- Nosso Compromisso -->
                <h2 class="title-nc">Nosso Compromisso</h2>
                <p class="text-nc">Nosso compromisso é oferecer uma plataforma confiável e intuitiva para que pacientes e clínicas odontológicas possam se conectar da melhor forma possível.
                    <br><br>
                    Trabalhamos para garantir organização, qualidade e agilidade no processo de agendamento de exames radiológicos. Seguimos aprimorando o sistema continuamente para proporcionar uma experiência cada vez mais completa, moderna e segura.
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
                        <a href="https://www.linkedin.com/in/brunoobrunelli/" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="https://github.com/BrunoOller" target="_blank"><i class="fa-brands fa-github"></i></a>
                    </div>
                </div>
                <p>Bruno Oller Brunelli</p>
            </div>

            <div class="fotosquipe">
                <div class="exibicao">
                    <img src="<?php echo BASE_URL; ?>app/wwwroot/img/about-us/surita.png" alt="Icone de atividade">
                    <div class="links">
                        <a href="https://www.linkedin.com/in/joaosurita/" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="https://github.com/JoaoSurita" target="_blank"><i class="fa-brands fa-github"></i></a>
                    </div>
                </div>
                <p>João Pedro Surita</p>
            </div>

            <div class="fotosquipe">
                <div class="exibicao">
                    <img src="<?php echo BASE_URL; ?>app/wwwroot/img/about-us/doa.png" alt="Icone de atividade">
                    <div class="links">
                        <a href="https://www.linkedin.com/in/eduardo-petarnella-gabri-18986b353/" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="https://github.com/EduardoGabri356" target="_blank"><i class="fa-brands fa-github"></i></a>
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