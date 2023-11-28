<!-- app/Views/auth/login.php -->

<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Login</h2>
    <?php if (session()->has('error')): ?>
        <div class="alert alert-danger"><?= session('error') ?></div>
    <?php endif; ?>
    <form action="/login" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label for="Nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="PseudoNom" name="Nom" value="<?= old('Nom') ?>" required>
        </div>
        <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="password" class="form-control" id="Password" name="Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <div class="mt-3">
        <p>Don't have an account? <a href="/register">Create one</a></p>
    </div>
</div>

<?= $this->endSection() ?>
