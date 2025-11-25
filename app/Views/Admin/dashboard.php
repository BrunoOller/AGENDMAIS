<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título do Site -->
    <title>AGENDMAIS - Sistema de Agendamento de Radiologia Odontologica</title>

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
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v7.1.0/css/all.css">
</head>

<body>
    <?php
    $total_usuarios = $data['total_usuarios'] ?? '0'; 
    $total_agendamentos = $data['total_agendamentos'] ?? '0'; 

    $usu_nome = $_SESSION['usu_nome'] ?? 'ADMINISTRADOR';
    ?>
    <main>
        <section class="a-header">
            <a href="index.php?controller=Home&action=index">
                <img class="logo" src="<?php echo BASE_URL; ?>app/wwwroot/img/logo.svg" alt="logo">
                <span class="badge text-bg-dark">ADMIN</span>
            </a>
        </section>

        <a id="btn-offcanva" class="btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            <i class="fa-solid fa-bars"></i>
        </a>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanva-menu">
                <div class="a-options">
                    <div class="profile">
                        <div class="a-profile">
                            <img src="<?php echo BASE_URL; ?>app/wwwroot/img/fotos-perfil/semfoto.jpg" alt="" class="a-photo">
                            <h3>ADMINISTRADOR</h3>
                        </div>
                    </div>
                    <div class="a-nav">
                        <ul>
                            <li><a href="#"><i class="fa-solid fa-chart-pie"></i> Dashboard</a></li>
                            <li><a href="index.php?controller=Admin&action=cadastrarUnidadeIndex"><i class="fa-solid fa-chart-simple"></i> Cadastrar Unidade</a></li>
                            <li><a href="#tabelaAgendamentos"><i class="fa-solid fa-calendar-check"></i> Gerenciar Agendamentos</a></li>
                            <li><a href="#tabelaUnidades"><i class="fa-solid fa-hospital-user"></i> Gerenciar Unidades</a></li>
                            <li><a href="#tabelaUsuarios"><i class="fa-solid fa-person"></i> Gerenciar Usuários</a></li>
                            <li><a href="index.php?controller=Login&action=logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Sair</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

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

        <section class="admin-table mt-5 tabela1" id="tabelaAgendamentos">
            <div class="container">
                <h2 class="mb-3"><i class="fa-solid fa-calendar-check me-2"></i> Agendamentos Recentes</h2>

                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th># ID</th>
                                <th>Data / Hora</th>
                                <th>Exame/Serviço</th>
                                <th>Paciente</th>
                                <th>Unidade</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($agendamentos)): ?>
                                <?php foreach ($agendamentos as $agendamento): ?>
                                    <?php
                                    $status = htmlspecialchars($agendamento->getAgendStatus());
                                    $badge_class = match (strtolower($status)) {
                                        'pendente' => 'badge bg-warning text-dark',
                                        'confirmado' => 'badge bg-primary',
                                        'realizado' => 'badge bg-success',
                                        'cancelado' => 'badge bg-danger',
                                        default => 'badge bg-secondary',
                                    };
                                    ?>
                                    <tr>
                                        <td><?= $agendamento->getIdAgendamento(); ?></td>
                                        <td>
                                            <?php echo (new DateTime($agendamento->getAgendData()))->format('d/m/Y'); ?>
                                            às <?= $agendamento->getAgendHora(); ?>
                                        </td>
                                        <td><?= htmlspecialchars($agendamento->getAgendExame()); ?></td>
                                        <td><?= htmlspecialchars($agendamento->getUsuNome() ?? 'ID: ' . $agendamento->getUsuarioId()); ?></td>
                                        <td><?= htmlspecialchars($agendamento->getUniNome() ?? 'Não Informada'); ?></td>
                                        <td><span class="<?= $badge_class; ?>"><?= $status; ?></span></td>
                                        <td>
                                            <button type="button"
                                                class="btn btn-sm btn-warning btn-edit-agendamento"
                                                title="Mudar Status"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editarAgendamentoModal"
                                                data-id="<?= $agendamento->getIdAgendamento(); ?>"
                                                data-exame="<?= htmlspecialchars($agendamento->getAgendExame()); ?>"
                                                data-data="<?= htmlspecialchars($agendamento->getAgendData()); ?>"
                                                data-hora="<?= htmlspecialchars($agendamento->getAgendHora()); ?>"
                                                data-status="<?= htmlspecialchars($agendamento->getAgendStatus()); ?>"
                                                data-paciente="<?= htmlspecialchars($agendamento->getUsuNome()); ?>"
                                                data-unidade-nome="<?= htmlspecialchars($agendamento->getUniNome() ?? 'N/A'); ?>">
                                                <i class="fa-solid fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">Nenhum agendamento encontrado.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section class="admin-table tabela2" id="tabelaUnidades">
            <div class="container">
                <h2 class="mb-3"><i class="fa-solid fa-hospital me-2"></i> Unidades Cadastradas</h2>

                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col"># ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Endereço</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($unidades) && is_array($unidades) && !empty($unidades)):
                                foreach ($unidades as $unidade):
                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $unidade->getIdUnidade(); ?></th>
                                        <td><?php echo htmlspecialchars($unidade->getUniNome()); ?></td>
                                        <td><?php echo htmlspecialchars($unidade->getUniEndereco()); ?></td>
                                        <td>
                                            <a href="index.php?controller=Admin&action=excluirUnidade&id=<?php echo $unidade->getIdUnidade(); ?>"
                                                class="btn btn-sm btn-danger btn-excluir-unidade"
                                                title="Excluir Unidade"
                                                onclick="return confirm('Tem certeza que deseja excluir a unidade <?php echo htmlspecialchars($unidade->getUniNome()); ?>? Esta ação não pode ser desfeita e pode afetar agendamentos.');">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                            else:
                                ?>
                                <tr>
                                    <td colspan="4" class="text-center">Nenhuma unidade de saúde cadastrada.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section class="admin-table mt-5 tabela3" id="tabelaUsuarios">
            <div class="container">
                <h2 class="mb-3"><i class="fa-solid fa-person me-2"></i>Usuários Cadastrados</h2>

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

                                    $tipoUsuario = $usuarioData->getUsuIsAdmin() ? 'Administrador' : ($usuarioData->getUnidadeId() ? 'Monitor' : 'Paciente');

                                    $rowClass = $usuarioData->getUsuIsAdmin() ? 'table-info' : '';
                                    ?>
                                    <tr class="<?= $rowClass ?>">
                                        <td><?= htmlspecialchars($usuarioData->getIdUsuario()) ?></td>
                                        <td><?= htmlspecialchars($usuarioData->getUsuNome()) ?></td>
                                        <td><?= htmlspecialchars($usuarioData->getUsuEmail()) ?></td>
                                        <td><?= htmlspecialchars($usuarioData->getUsuTelefone()) ?></td>
                                        <td><?= htmlspecialchars($tipoUsuario) ?></td>
                                        <td>
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

        <!--Modal-->
        <div class="modal fade" id="editarAgendamentoModal" tabindex="-1" aria-labelledby="editarAgendamentoLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form id="formEdicaoAgendamento" action="index.php?controller=Admin&action=salvarEdicaoAgendamento" method="POST">
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="editarAgendamentoLabel"><i class="fa-solid fa-edit me-2"></i> Editar Agendamento: <span id="modalAgendamentoID"></span></h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <input type="hidden" name="id_agendamento" id="inputAgendamentoID">

                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Detalhes Principais</h6>
                                    <ul class="list-group list-group-flush mb-3">
                                        <li class="list-group-item"><strong>Paciente:</strong> <span id="modalPacienteNome"></span></li>
                                        <li class="list-group-item"><strong>Unidade:</strong> <span id="modalUnidadeNome"></span></li>
                                        <li class="list-group-item"><strong>Exame/Serviço:</strong> <span id="modalAgendExame"></span></li>
                                        <li class="list-group-item"><strong>Data:</strong> <span id="modalAgendData"></span></li>
                                        <li class="list-group-item"><strong>Hora:</strong> <span id="modalAgendHora"></span></li>
                                    </ul>
                                </div>

                                <div class="col-md-6">
                                    <h6>Ajustes Administrativos</h6>

                                    <div class="mb-3">
                                        <label for="inputAgendStatus" class="form-label">Status</label>
                                        <select class="form-select" id="inputAgendStatus" name="agend_status" required>
                                            <?php
                                            $statusPossiveis = ['Pendente', 'Confirmado', 'Realizado', 'Cancelado'];
                                            foreach ($statusPossiveis as $status):
                                            ?>
                                                <option value="<?php echo htmlspecialchars($status); ?>">
                                                    <?php echo htmlspecialchars($status); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-success"><i class="fa-solid fa-save me-1"></i> Salvar Status</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
            crossorigin="anonymous"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const editButtons = document.querySelectorAll('.btn-edit-agendamento');
                const modalElement = document.getElementById('editarAgendamentoModal');

                const editarAgendamentoModal = new bootstrap.Modal(modalElement);

                editButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        const exame = this.getAttribute('data-exame');
                        const data = this.getAttribute('data-data');
                        const hora = this.getAttribute('data-hora');
                        const status = this.getAttribute('data-status');
                        const pacienteNome = this.getAttribute('data-paciente');
                        const unidadeNome = this.getAttribute('data-unidade-nome');

                        const dataFormatada = new Date(data + 'T00:00:00').toLocaleDateString('pt-BR');

                        document.getElementById('modalAgendamentoID').textContent = id;
                        document.getElementById('modalPacienteNome').textContent = pacienteNome;
                        document.getElementById('modalAgendExame').textContent = exame;
                        document.getElementById('modalAgendData').textContent = dataFormatada;
                        document.getElementById('modalAgendHora').textContent = hora;
                        document.getElementById('modalUnidadeNome').textContent = unidadeNome;


                        document.getElementById('inputAgendamentoID').value = id;
                        document.getElementById('inputAgendStatus').value = status;

                        editarAgendamentoModal.show();
                    });
                });


                const urlParams = new URLSearchParams(window.location.search);
                if (urlParams.get('msg') === 'sucesso_agendamento') {
                    alert('Agendamento alterado com sucesso!');
                    history.replaceState({}, document.title, window.location.pathname + window.location.search.replace(/&msg=sucesso_agendamento/g, ''));
                }
            });
        </script>
    </main>
</body>

</html>