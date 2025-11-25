<?php
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
                    $nomeCompleto = $_SESSION['usu_nome'] ?? 'Usuário';
                    $primeiroEspaco = strpos($nomeCompleto, ' ');

                    if ($primeiroEspaco !== false) {
                        $primeiroNome = substr($nomeCompleto, 0, $primeiroEspaco);
                    } else {
                        $primeiroNome = $nomeCompleto;
                    }
                ?>

                    <div class="dropdown mx-4" id="drop">
                        <button
                            class="btn p-0 border-0 bg-transparent"
                            id="dropdownMenuButton"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img
                                src="<?php echo BASE_URL; ?>app/wwwroot/img/fotos-perfil/semfoto.jpg"
                                alt="Foto"
                                class="rounded-circle"
                                style="width: 42px; height: 42px; object-fit: cover; border: 2px solid #ddd;">
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end shadow">
                            <li>
                                <a class="dropdown-item" href="index.php?controller=Perfil&action=perfilIndex">
                                    <i class="bi bi-person-circle me-2"></i> Meu Perfil
                                </a>
                            </li>

                            <?php if (isset($_SESSION['usu_is_admin']) && $_SESSION['usu_is_admin']): ?>
                                <li>
                                    <a class="dropdown-item" href="index.php?controller=Admin&action=dashboard">
                                        <i class="bi bi-speedometer2 me-2"></i> Painel Admin
                                    </a>
                                </li>
                            <?php endif; ?>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item text-danger" href="index.php?controller=Login&action=logout">
                                    <i class="bi bi-box-arrow-right me-2"></i> Sair
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php
                } else {
                    // --- LINKS PARA USUÁRIO DESLOGADO ---
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=Login&action=index">Login</a>
                    </li>
                    <li class="nav-item ni2">
                        <a class="nav-link" href="index.php?controller=Login&action=registrarIndex">Cadastre-se</a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

<style>
    .nav-item {
        margin: 0 5px;
    }

    #drop button img {
        transition: all .25s ease-out;
    }
    
    #drop button:hover img {
        filter: brightness(90%);
        transition: all .25s ease-in;
    }

    .dropdown-menu {
        border-radius: 5px;
        padding: 8px 0;
    }

    .dropdown-item {
        padding: 10px 16px;
        font-size: 15px;
        border-radius: 5px;
    }

    .dropdown-item:hover {
        background: #f1f1f1;
    }
</style>