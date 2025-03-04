
<?= $this->extend('layout/layout2') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4" style="width: 350px;">
        <div class="text-center">
            <h3 class="mb-3">Iniciar Sesión</h3>
        </div>
        <form action="<?= base_url('/login') ?>" method="POST">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" name="usuario" class="form-control" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" name="contrasena" class="form-control" required>
                </div>
            </div>
            <button class="btn btn-primary w-100">Entrar</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
