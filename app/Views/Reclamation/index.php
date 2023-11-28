<!-- app/Views/reclamation/index.php -->

<?= $this->extend('layouts/compte') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Reclamations</h2>
    <a href="/reclamation/create" class="btn btn-primary mb-3">Add Reclamation</a>
    <div class="mb-3">
      
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>NumReclamation</th>
                <th>CorpReclamation</th>
                <th>DateReclamation</th>
                <th>Nom</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reclamations as $reclamation): ?>
                <tr>
                    <td><?= $reclamation['NumReclamation'] ?></td>
                    <td><?= $reclamation['CorpReclamation'] ?></td>
                    <td><?= $reclamation['DateReclamation'] ?></td>
                    <td><?= $reclamation['PseudoNom'] ?></td>
                    <td>
                        <a href="/reclamation/edit/<?= $reclamation['NumReclamation'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="/reclamation/delete/<?= $reclamation['NumReclamation'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
