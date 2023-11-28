<!-- app/Views/reclamation/create.php -->

<?= $this->extend('layouts/compte') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Create Reclamation</h2>
    <form action="/reclamation/store" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label for="CorpReclamation" class="form-label">CorpReclamation</label>
            <input type="text" class="form-control" id="CorpReclamation" name="CorpReclamation" required>
        </div>
        <div class="mb-3">
            <label for="DateReclamation" class="form-label">DateReclamation</label>
            <input type="date" class="form-control" id="DateReclamation" name="DateReclamation" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

<?= $this->endSection() ?>
