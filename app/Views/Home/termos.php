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
        <h1>Termos de Uso</h1>
        <p>Bem-vindo ao nosso sistema de agendamento online de consultas médicas em postos de saúde e hospitais. Ao
            utilizar nossa plataforma, você concorda com os termos e condições abaixo. Leia com atenção.</p>
        <p>...</p>
    </section>

    <section class="terms-list">
        <ol>
            <div class="list-block">
                <li class="list-title">Sobre o sistema</li>
                <p>Nosso site oferece um serviço online para facilitar o agendamento de consultas médicas e atendimentos
                    em unidades de saúde. Não realizamos atendimentos médicos diretamente, apenas intermediamo o contato
                    entre pacientes e instituições de saúde cadastradas.</p>
            </div>

            <div class="list-block">
                <li class="list-title">Cadastro de usuários</li>
                <p>Para utilizar os serviços, o usuário deverá criar uma conta fornecendo informações verdadeiras e
                    completas. O uso da conta é pessoal e intransferível.
                    Existem três tipos de contas:
                <ul>
                    <li>Pacientes</li>
                    <li>Médicos</li>
                    <li>Unidades de saúde (postos/hospitais)</li>
                </ul>
                </p>
            </div>

            <div class="list-block">
                <li class="list-title">Agendamentos</li>
                <p>O usuário é responsável pelas informações fornecidas durante o agendamento. Cancelamentos devem ser
                    realizados com antecedência, conforme as regras de cada posto de saúde. Consultas ausentes sem
                    justificativa podem resultar em restrições futuras.</p>
            </div>

            <div class="list-block">
                <li class="list-title">Responsabilidades</li>
                <ul>
                    <li>O sistema se compromete a manter a plataforma funcional e segura, mas não se responsabiliza por
                        falhas médicas, atrasos de atendimento ou informações incorretas fornecidas por terceiros.</li>
                    <li>É de responsabilidade do usuário manter a confidencialidade de sua senha.</li>
                </ul>
            </div>

            <div class="list-block">
                <li class="list-title">Suspensão e cancelamento de contas</li>
                <p>Reservamo-nos o direito de suspender ou cancelar contas que violem estes termos ou utilizem o sistema
                    de forma indevida.</p>
            </div>

            <div class="list-block">
                <li class="list-title">Modificações nos termos</li>
                <p>Este documento pode ser alterado a qualquer momento. Alterações importantes serão informadas por
                    e-mail ou no próprio site.</p>
            </div>

            <div class="list-block">
                <li class="list-title">Contato</li>
                <p>Para dúvidas, suporte ou reclamações, entre em contato conosco através da página "Fale Conosco" ou
                    envie um e-mail para: suporte@agendmais.com</p>
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