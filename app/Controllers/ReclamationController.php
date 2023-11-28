<?php

// app/Controllers/Reclamation.php

namespace App\Controllers;

use App\Models\Reclamation;

class ReclamationController extends BaseController
{
    public function index()
    {
        $reclamationModel = new Reclamation();
        $data['reclamations'] = $reclamationModel->findAll();

        return view('reclamation/index', $data);
    }

    public function create()
    {
        return view('reclamation/create');
    }

    public function store()
    {
        $reclamationModel = new Reclamation();

        // Validation rules
        $validationRules = [
            'CorpReclamation' => 'required',
            'DateReclamation' => 'required|valid_date', // Assurez-vous que 'DateReclamation' correspond à votre format de date
        ];

        if ($this->validate($validationRules)) {
            // Validation succeeded

            // Retrieve the currently logged-in user's PseudoNom
            $pseudoNom = session('Nom');  // Adjust this based on your session structure

            $data = [
                'CorpReclamation' => $this->request->getPost('CorpReclamation'),
                'DateReclamation' => $this->request->getPost('DateReclamation'),
                'PseudoNom' => $pseudoNom,
            ];

            $reclamationModel->insert($data);

            return redirect()->to('/reclamation');
        } else {
            // Validation failed, return to the create view with errors
            return view('reclamation/create', ['validation' => $this->validator]);
        }
    }

    public function update($id)
    {
        $reclamationModel = new Reclamation();

        // Validation rules
        $validationRules = [
            'CorpReclamation' => 'required',
            'DateReclamation' => 'required|valid_date', // Assurez-vous que 'DateReclamation' correspond à votre format de date
        ];
      

        if ($this->validate($validationRules)) {
        //     // Validation succeeded

            // Retrieve the currently logged-in user's PseudoNom
            $pseudoNom = session('Nom');  // Adjust this based on your session structure

            $data = [
                'CorpReclamation' => $this->request->getPost('CorpReclamation'),
                'DateReclamation' => $this->request->getPost('DateReclamation'),
                'PseudoNom' => $pseudoNom,
            ];

            $reclamationModel->update($id, $data);

            return redirect()->to('/reclamation');
        } else {
            // Validation failed, return to the edit view with errors
            return view('reclamation/edit', ['validation' => $this->validator, 'reclamation' => $reclamationModel->find($id)]);
        }
    }
    public function edit($id)
    {
        $reclamationModel = new Reclamation();
        $data['reclamation'] = $reclamationModel->find($id);

        return view('reclamation/edit', $data);
    }

    public function delete($id)
    {
        $reclamationModel = new Reclamation();
        $reclamationModel->delete($id);

        return redirect()->to('/reclamation');
    }
}
