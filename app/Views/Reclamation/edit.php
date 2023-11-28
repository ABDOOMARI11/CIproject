<!-- app/Views/reclamation/edit.php -->

<?= $this->extend('layouts/compte') ?>

<?= $this->section('content') ?>



<div class="container mt-4">
    <h2>Edit Reclamation</h2>
    <form action="/reclamation/update/<?= $reclamation['NumReclamation'] ?>" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label for="CorpReclamation" class="form-label">CorpReclamation</label>
            <input type="text" class="form-control" id="CorpReclamation" name="CorpReclamation" value="<?= $reclamation['CorpReclamation'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="DateReclamation" class="form-label">DateReclamation</label>
            <input type="date" class="form-control" id="DateReclamation" name="DateReclamation" value="<?= $reclamation['DateReclamation'] ?>" required>
        </div>
        <!-- Remove the PseudoNom input field -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<?= $this->endSection() ?>
