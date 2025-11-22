<?php

function showMessage($msg)
{
    switch ($msg) {
        case 'update_sucesso':
            return ['type' => 'success', 'text' => 'Perfil atualizado com sucesso!'];
        case 'erro_bd':
            return ['type' => 'danger', 'text' => 'Erro ao salvar as informações no banco de dados.'];
        case 'erro_campos':
            return ['type' => 'warning', 'text' => 'Por favor, preencha todos os campos obrigatórios.'];
        default:
            return null;
    }
}

$feedback = showMessage($_GET['msg'] ?? null);

// Garante que a foto de perfil usa a URL base (o 3.png é um placeholder)
$foto_perfil_url = BASE_URL . 'app/wwwroot/img/fotos-perfil/3.png';
?>

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

    <form action="index.php?controller=Perfil&action=updateProfile" method="POST">
        <section id="infos-perfil">
            <div class="container ip-content">
                <h2>Suas informações:</h2>
                <div class="ip-dados">

                    <!-- Nome -->
                    <div id="nome" class="info">
                        <label for="d-name">Nome*</label>
                        <input type="text"
                            value="<?php echo htmlspecialchars($usuario->nome ?? ''); ?>"
                            name="nome" id="d-name" required>
                    </div>

                    <!-- Telefone -->
                    <div id="telefone" class="info">
                        <label for="d-tel">Telefone*</label>
                        <input type="tel"
                            value="<?php echo htmlspecialchars($usuario->telefone ?? ''); ?>"
                            name="telefone" id="d-tel" required>
                    </div>

                    <!-- Data de Nascimento -->
                    <div id="datanasc" class="info">
                        <label for="d-date">Data de Nascimento*</label>
                        <input type="date"
                            value="<?php echo htmlspecialchars($usuario->data_nascimento ?? ''); ?>"
                            name="data_nascimento" id="d-date" required>
                    </div>

                    <!-- Senha -->
                    <!-- NOTA: A senha é tratada no Controller. Se este campo for preenchido, a senha será alterada. -->
                    <div id="senha" class="info">
                        <label for="d-password">Nova Senha</label>
                        <div class="senha-input">
                            <div class="input">
                                <input type="password"
                                    placeholder="Deixe em branco para não alterar"
                                    name="senha" id="d-password">
                                <i class="fa-solid fa-eye-slash" onclick="togglePassword()"></i>
                            </div>
                        </div>
                    </div>

                    <!-- CPF (Readonly) -->
                    <div id="usucpf" class="info">
                        <label for="d-cpf">CPF*</label>
                        <input type="text"
                            value="<?php
                                    $cpf_value = $usuario->cpf ?? '';
                                    echo htmlspecialchars(empty($cpf_value) ? 'Não informado' : $cpf_value);
                                    ?>"
                            name="cpf" id="d-cpf" disabled readonly>
                    </div>

                    <!-- E-mail -->
                    <div id="e-mail" class="info">
                        <label for="d-email">E-mail*</label>
                        <input type="email"
                            value="<?php echo htmlspecialchars($usuario->email ?? ''); ?>"
                            name="email" id="d-email" required>
                    </div>
                </div>
            </div>
        </section>

        <!-- Botão de Salvar (Submete o formulário) -->
        <div class="container d-flex justify-content-center mb-5">
            <button type="submit" class="btn btn-success btn-lg shadow">
                <i class="fas fa-save me-2"></i> Salvar Alterações
            </button>
        </div>
    </form>

    <?php if ($feedback): ?>
        <div class="container mt-3">
            <div class="alert alert-<?php echo $feedback['type']; ?> alert-dismissible fade show" role="alert">
                <?php echo $feedback['text']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>

    <section id="appointmentHistory">
        <h1>Meus Agendamentos</h1>
        <div class="container ah-content">

            <?php
            if (!empty($agendamentos)):
                $counter = 1;
                foreach ($agendamentos as $ag):
                    // CORREÇÃO: Usando os métodos separados e concatenando para criar o objeto DateTime
                    $data_hora_string = $ag->getAgendData() . ' ' . $ag->getAgendHora();
                    $data_hora = new \DateTime($data_hora_string);

                    // Usando os getters corretos do Model
                    $status_text = $ag->getAgendStatus();
                    $descricao_exame = $ag->getAgendExame();

                    $badge_class = match (strtolower($status_text)) {
                        'pendente' => 'text-bg-warning',
                        'confirmado' => 'text-bg-primary',
                        'realizado' => 'text-bg-success',
                        default => 'text-bg-secondary',
                    };
            ?>
                    <div class="block">
                        <div class="b-header">
                            <h2><span>Agendamento #</span><?php echo str_pad($counter++, 3, '0', STR_PAD_LEFT); ?></h2>
                            <div class="status">
                                <h2>Status: <span class="badge <?php echo $badge_class; ?>"><?php echo htmlspecialchars($status_text); ?></span></h2>
                            </div>
                        </div>
                        <div class="b-info">
                            <div class="i-image">
                                <div class="line"></div>
                                <!-- Usando a URL base para o placeholder -->
                                <img src="<?php echo BASE_URL; ?>app/wwwroot/img/fotos-perfil/appointmentHistory.png" alt="Foto de Agendamento Médico" id="foto">
                            </div>
                            <div class="i-infos">
                                <ul>
                                    <!--<li><span id="emphasis">CPF:</span> <?php //echo htmlspecialchars($usuario->cpf ?? 'Não informado'); ?></li>-->
                                    <li><span id="emphasis">Horário escolhido:</span> <?php echo $data_hora->format('H:i'); ?></li>
                                    <li><span id="emphasis">Dia da consulta:</span> <?php echo $data_hora->format('d/m/Y'); ?></li>
                                    <li><span id="emphasis">Exame/Serviço:</span> <br> <span id="exam"><?php echo htmlspecialchars($ag->getAgendExame()); ?></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
            else:
                ?>
                <div class="alert alert-info text-center">
                    Você não possui agendamentos registrados.
                </div>
            <?php endif; ?>
        </div>

        <!-- O botão "Ver mais" necessitaria de uma lógica JavaScript/AJAX para paginação, mantendo-o estático por enquanto. -->
        <?php if (!empty($agendamentos) && count($agendamentos) > 5): // Exemplo de condição para exibir 
        ?>
            <button id="see-more">Ver mais</button>
        <?php endif; ?>
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
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('d-password');
            const icon = document.querySelector('#senha .fa-eye-slash');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        }
    </script>
</body>

</html>