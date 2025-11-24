<?php
// Verifica se a variável $data existe e contém o usuário e unidades
if (!isset($data['usuario']) || !isset($data['unidades'])) {
    header("Location: index.php?controller=Admin&action=dashboard");
    exit;
}
$usuario = $data['usuario'];
$unidades = $data['unidades'];
// Se você está usando um template completo, inclua o header/footer aqui
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">✏️ Editar Usuário: <?= htmlspecialchars($usuario->getUsuNome()) ?></h2>
                </div>
                <div class="card-body">
                    <form action="index.php?controller=Admin&action=salvarEdicaoUsuario" method="POST">

                        <input type="hidden" name="id_usuario" value="<?= htmlspecialchars($usuario->getIdUsuario()) ?>">

                        <div class="mb-3">
                            <label for="usu_nome" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" id="usu_nome" name="usu_nome"
                                value="<?= htmlspecialchars($usuario->getUsuNome()) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="usu_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="usu_email" name="usu_email"
                                value="<?= htmlspecialchars($usuario->getUsuEmail()) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="usu_telefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="usu_telefone" name="usu_telefone"
                                value="<?= htmlspecialchars($usuario->getUsuTelefone() ?? '') ?>">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="index.php?controller=Admin&action=dashboard" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-success">Salvar Alterações</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>