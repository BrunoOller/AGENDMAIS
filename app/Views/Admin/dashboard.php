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
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/wwwroot/css/Admin/dashboard.css?v=1.0">

    <!-- Link Fontawesome -->
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v6.7.2/css/all.css">
</head>

<body>
    <?php
    // Extrai os dados do array $data para variáveis locais
    $total_usuarios = $data['total_usuarios'] ?? '0'; // Pega a contagem de usuários
    $total_agendamentos = $data['total_agendamentos'] ?? '0'; // Pega a contagem de agendamentos

    // Verifica se a variável de sessão de usuário está definida (para o nome na barra lateral)
    $usu_nome = $_SESSION['usu_nome'] ?? 'ADMINISTRADOR';
    ?>
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
                        <li><a href="#tabelaAgendamentos"><i class="fa-solid fa-calendar-check"></i> Gerenciar Agendamentos</a></li>
                        <li><a href="#tabelaUsuarios"><i class="fa-solid fa-person"></i> Gerenciar Usuários</a></li>
                        <li><a href="index.php?controller=Login&action=logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Sair</a></li>
                    </ul>
                </div>
            </div>
        </section>

        <div class="general">
            <div class="fundo-offcanva"></div>
                <section class="a-infos">
                    <div class="a-container">
                        <div class="accesses">
                            <div class="duo">
                                <img src="<?php echo BASE_URL; ?>app/wwwroot/img/admin/person.svg" alt="Ícone de Pessoa">
                                <p>Usuários</p>
                            </div>
                            <p class="number"><?= htmlspecialchars(number_format($total_usuarios, 0, ',', '.')) ?></p>
                        </div>
                        <div class="accesses">
                            <div class="duo">
                                <img src="<?php echo BASE_URL; ?>app/wwwroot/img/admin/sino.svg" alt="Ícone de Sino">
                                <p>Agendamentos</p>
                            </div>
                            <p class="number"><?= htmlspecialchars(number_format($total_agendamentos, 0, ',', '.')) ?></p>
                        </div>
                    </div>
                </section>

                <section class="admin-table mt-5" id="tabelaUsuarios">
                    <div class="container-fluid">
                        <h2 class="mb-3">Usuários Cadastrados</h2>

                        <?php if (isset($data['msg'])): ?>
                            <?php if ($data['msg'] === 'excluido_sucesso_user'): ?>
                                <div class="alert alert-success" role="alert">Usuário excluído com sucesso!</div>
                            <?php elseif ($data['msg'] === 'erro_exclusao'): ?>
                                <div class="alert alert-danger" role="alert">Erro ao excluir usuário. Verifique se há agendamentos associados.</div>
                            <?php elseif ($data['msg'] === 'erro_proprio'): ?>
                                <div class="alert alert-warning" role="alert">Você não pode excluir sua própria conta de administrador.</div>
                            <?php endif; ?>
                        <?php endif; ?>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th># ID</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Telefone</th>
                                        <th>Tipo</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($data['usuarios'])): ?>
                                        <?php foreach ($data['usuarios'] as $usuario): ?>
                                            <?php
                                            $usuarioData = $usuario instanceof \App\Models\Usuario ? $usuario : new \App\Models\Usuario($usuario);

                                            // Define o tipo de usuário
                                            $tipoUsuario = $usuarioData->getUsuIsAdmin() ? 'Administrador' : ($usuarioData->getUnidadeId() ? 'Monitor' : 'Paciente');

                                            // Destaca o Admin (Opcional)
                                            $rowClass = $usuarioData->getUsuIsAdmin() ? 'table-info' : '';
                                            ?>
                                            <tr class="<?= $rowClass ?>">
                                                <td><?= htmlspecialchars($usuarioData->getIdUsuario()) ?></td>
                                                <td><?= htmlspecialchars($usuarioData->getUsuNome()) ?></td>
                                                <td><?= htmlspecialchars($usuarioData->getUsuEmail()) ?></td>
                                                <td><?= htmlspecialchars($usuarioData->getUsuTelefone()) ?></td>
                                                <td><?= htmlspecialchars($tipoUsuario) ?></td>
                                                <td>
                                                    <a href="index.php?controller=Admin&action=editarUsuario&id=<?= htmlspecialchars($usuarioData->getIdUsuario()) ?>" class="btn btn-sm btn-info text-white me-2" title="Editar">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <a href="index.php?controller=Admin&action=excluirUsuario&id=<?= $usuarioData->getIdUsuario() ?>"
                                                        class="btn btn-sm btn-danger"
                                                        title="Excluir"
                                                        onclick="return confirm('Tem certeza que deseja excluir o usuário (ID: <?= $usuarioData->getIdUsuario() ?> - <?= $usuarioData->getUsuNome() ?>)?')">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="7" class="text-center">Nenhum usuário encontrado.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
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