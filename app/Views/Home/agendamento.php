<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGEND+ - Sistema de Agendamento de Saúde</title>
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>app/wwwroot/img/agendm-fav.svg" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/reset.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/color.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/Home/agendamento.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/globalStyle.css">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>

    <?php include 'app/Views/Layout/header.php'; ?>

    <form method="POST" action="index.php?controller=Agendamento&action=agendar">

        <div class="gradeAgendamento">
            <div class="itens"></div>
            <h2>AGENDAMENTO DE CONSULTA:</h2>
            <p>Agende aqui de forma rápida e simples!</p>
        </div>

        <span>...</span>

        <?php if (isset($msg)): ?>
            <?php
            $alert_class = '';
            $alert_message = '';
            $show_alert = true;

            switch ($msg) {
                case 'sucesso':
                    $alert_class = 'alert-success';
                    $alert_message = 'Agendamento solicitado com sucesso! Consulte seu agendamento em "Perfil" e vá em "Meus Agendamentos".';
                    break;
                case 'erro_campos':
                    $alert_class = 'alert-warning';
                    $alert_message = 'Erro: Preencha todos os campos obrigatórios para continuar.';
                    break;
                case 'erro_bd':
                    $alert_class = 'alert-danger';
                    $alert_message = 'Erro ao salvar o agendamento. Tente novamente mais tarde.';
                    break;
                default:
                    $show_alert = false;
                    break;
            }
            ?>
            <?php if ($show_alert): ?>
                <div class="container mt-3">
                    <div class="alert <?= $alert_class; ?> alert-dismissible fade show" role="alert">
                        <?= $alert_message; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <div class="selections">
            <div class="container s-section">
                <div class="s-exame">
                    <h2>Selecione um exame*</h2>
                    <div class="selection">
                        <select id="select-exame" name="select_exame" required>
                            <option value="" disabled selected>Selecionar</option>
                            <?php
                            // Verifica se $exames existe e não está vazio
                            if (!empty($exames) && !isset($exames['Erro'])):
                                foreach ($exames as $key => $nomeExame):
                            ?>
                                    <option value="<?= htmlspecialchars($key) ?>">
                                        <?= htmlspecialchars(ucfirst(str_replace('_', ' ', $nomeExame))) ?>
                                    </option>
                                <?php
                                endforeach;
                            else:
                                ?>
                                <option value="">Nenhum exame disponível (Erro BD)</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="s-unidade">
                    <h2>Selecione a unidade desejada*</h2>
                    <div class="selection">
                        <select id="select-unidade" name="unidade_id" required>
                            <option value="" disabled selected>Selecionar</option> <?php
                            // Verifica se a variável $unidades existe e é um array
                            if (isset($unidades) && is_array($unidades)) {
                                // Itera sobre cada objeto Unidade retornado do banco de dados
                                foreach ($unidades as $unidade) {
                                    // Usa o ID da unidade como 'value' para o POST
                                    $id = $unidade->getIdUnidade();
                                    // Usa o nome da unidade como o texto visível
                                    $nome = $unidade->getUniNome();

                                    echo "<option value=\"{$id}\">{$nome}</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div id="info-unidade" class="info-box"
                        style="display: none; margin-top: 15px; padding: 10px; background-color: #f4f4f4; border-radius: 5px;">
                        <p id="info-endereco" style="margin: 0; font-style: italic;"></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="choose">
            <div class="container c-section">
                <div class="s-data">
                    <h2>Escolha o dia da consulta*</h2>
                    <div class="selection">
                        <input type="date" id="data-agendamento" name="data_agendamento" required>
                    </div>
                </div>
                <div class="s-horario">
                    <h2>Qual horário você prefere?*</h2>
                    <div class="selection">
                        <input type="time" id="horario-agendamento" name="horario_agendamento" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-submit">
            <button type="submit" id="s-button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop">
                Agendar
            </button>
        </div>
    </form>

    <script src="<?php echo BASE_URL; ?>app/wwwroot/js/agendamento/script-exame.js"></script>
    <script src="<?php echo BASE_URL; ?>app/wwwroot/js/agendamento/script-unidades.js"></script>
    <script src="<?php echo BASE_URL; ?>app/wwwroot/js/agendamento/script-data-hora.js"></script>
    <script src="<?php echo BASE_URL; ?>app/wwwroot/js/agendamento/script-popExame.js"></script>
</body>

</html>