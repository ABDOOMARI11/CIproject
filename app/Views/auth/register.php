<!-- app/Views/auth/register.php -->

<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Register</h2>
    <?php if (session()->has('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session('errors') as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="/register" method="post">

        <?= csrf_field() ?>
       

        <div class="mb-3">
            <label for="Nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="Nom" name="Nom" value="<?= old('Nom') ?>" required>
        </div>
        <div class="mb-3">
            <label for="Prenom" class="form-label">Prenom</label>
            <input type="text" class="form-control" id="Prenom" name="Prenom" value="<?= old('Prenom') ?>" required>
        </div>
        <div class="mb-3">
            <label for="Adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="Adresse" name="Adresse" value="<?= old('Adresse') ?>" required>
        </div>
        <div class="mb-3">
            <label for="Sexe" class="form-label">Sexe</label>
            <select class="form-control" id="Sexe" name="Sexe" required>
                <option value="M" <?= old('Sexe') == 'M' ? 'selected' : '' ?>>Male</option>
                <option value="F" <?= old('Sexe') == 'F' ? 'selected' : '' ?>>Female</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="Profession" class="form-label">Profession</label>
            <input type="text" class="form-control" id="Profession" name="Profession" value="<?= old('Profession') ?>" required>
        </div>
        <div class="mb-3">
            <label for="DateNaissance" class="form-label">DateNaissance</label>
            <input type="date" class="form-control" id="DateNaissance" name="DateNaissance" value="<?= old('DateNaissance') ?>" required>
        </div>
        <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="password" class="form-control" id="Password" name="Password" required>
        </div>
        <div class="mb-3">
            <label for="Password_confirm" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="Password_confirm" name="Password_confirm" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>


<?= $this->endSection() ?>
