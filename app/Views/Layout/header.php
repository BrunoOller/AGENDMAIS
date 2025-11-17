<?php
    // Garantimos que a variável de status é definida aqui, caso a View não a defina
    $logado = $_SESSION['logado'] ?? false;
?>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid px-5">
            <a class="navbar-brand" href="index.php?controller=Home&action=index">
                <img src="<?php echo BASE_URL; ?>app/wwwroot/img/logo.svg" id="logo">
            </a>

            <!-- Botão para mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php?controller=Home&action=sobre">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=Home&action=contato">Contato</a>
                    </li>

                    <?php
                    if ($logado) {
                        // --- LINKS PARA USUÁRIO LOGADO ---
                        $nomeCompleto = $_SESSION['usu_nome'] ?? 'Usuário';
                        $primeiroEspaco = strpos($nomeCompleto, ' ');
                        
                        if ($primeiroEspaco !== false) {
                            $primeiroNome = substr($nomeCompleto, 0, $primeiroEspaco);
                        } else {
                            $primeiroNome = $nomeCompleto;
                        }
                    ?>
 
                        <span class="nav-link">Olá, <strong><?php echo $primeiroNome; ?></strong>!</span>

                        <?php
                        if (isset($_SESSION['usu_is_admin']) && $_SESSION['usu_is_admin']) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?controller=Admin&action=dashboard">Painel Admin</a>
                            </li>
                        <?php
                        }
                        ?>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Meus Agendamentos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=Login&action=logout">Sair</a>
                        </li>
                    <?php
                    } else {
                        // --- LINKS PARA USUÁRIO DESLOGADO ---
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=Login&action=index">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=Login&action=registrarIndex">Cadastre-se</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>