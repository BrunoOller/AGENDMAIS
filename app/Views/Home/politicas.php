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
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/Home/termsPoliciesStyle.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/globalStyle.css">
</head>

<body>
    <?php include 'app/Views/Layout/header.php'; ?>

    <!-- Seção para o texto principal -->
    <section class="title">
        <h1>Política de Privacidade</h1>
        <p>Esta Política de Privacidade explica como coletamos, usamos e protegemos os dados pessoais dos usuários do nosso sistema de agendamento online. Estamos comprometidos com a segurança das suas informações e o cumprimento da Lei Geral de Proteção de Dados (LGPD).</p>
        <p>...</p>
    </section>

    <section class="terms-list">
        <ol>
            <div class="list-block">
                <li class="list-title">Dados que coletamos</li>
                <p>Ao utilizar o sistema, coletamos os seguintes dados:</p>
                <ul>
                    <li>Dados de identificação: nome, CPF, e-mail, telefone, data de nascimento</li>
                    <li>Dados de localização: endereço, cidade, estado</li>
                    <li>Dados de saúde básicos: especialidade médica solicitada, agendamentos realizados</li>
                    <li>Dados profissionais (no caso de médicos ou unidades): CRM, CNPJ, especialidades, horários de atendimento</li>
                </ul>
            </div>

            <div class="list-block">
                <li class="list-title">Como usamos seus dados</li>
                <p>Seus dados são utilizados para:</p>
                <ul>
                    <li>Criar e gerenciar sua conta</li>
                    <li>Agendar consultas com postos e profissionais de saúde</li>
                    <li>Enviar notificações por e-mail ou SMS</li>
                    <li>Melhorar nossos serviços com base no uso</li>
                </ul>
            </div>

            <div class="list-block">
                <li class="list-title">Compartilhamento de dados</li>
                <p>Compartilhamos apenas os dados necessários com os postos de saúde e médicos para viabilizar os agendamentos. Não vendemos nem alugamos seus dados a terceiros.</p>
            </div>

            <div class="list-block">
               <li class="list-title">Armazenamento e segurança</li>
                <p>Seus dados são armazenados de forma segura em servidores protegidos e com acesso restrito. Utilizamos criptografia e outras práticas de segurança para evitar acessos não autorizados.</p>
            </div>

            <div class="list-block">
               <li class="list-title">Seus direitos</li>
                <p>Você pode, a qualquer momento:</p>
                <ul>
                    <li>Solicitar acesso aos seus dados</li>
                    <li>Corrigir informações incorretas</li>
                    <li>Solicitar a exclusão de seus dados (exceto quando obrigados por lei a mantê-los)</li>
                </ul>
            </div>

            <div class="list-block">
                <li class="list-title">Cookies e rastreamento</li>
                <p>Usamos cookies apenas para melhorar sua experiência de navegação e manter sua sessão ativa. Você pode desativar os cookies no seu navegador.</p>
            </div>

            <div class="list-block">
                <li class="list-title">Alterações nesta política</li>
                <p>Esta Política pode ser atualizada a qualquer momento. Notificaremos alterações importantes por e-mail ou através do próprio site.</p>
            </div>

            <div class="list-block">
                <li class="list-title">Fale conosco</li>
                <p>Para dúvidas, suporte ou reclamações, entre em contato conosco através da página "Fale Conosco" ou envie um e-mail para: suporte@agendmais.com</p>
            </div>
        </ol>
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