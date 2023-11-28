<?php

// app/Controllers/Auth.php

namespace App\Controllers;

use App\Models\Utilisateurs;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function processLogin()
    {
        // Validation des données du formulaire
        $validation = \Config\Services::validation();
        $validation->setRules([
            'Nom' => 'required',
            'Password' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/')->withInput()->with('errors', $validation->getErrors());
        }

        // Récupération des données du formulaire
        $nom = $this->request->getPost('Nom');
        $password = $this->request->getPost('Password');

        // Recherche de l'utilisateur dans la base de données
        $utilisateursModel = new Utilisateurs();
        $user = $utilisateursModel->where('Nom', $nom)->first();

        if ($user && password_verify($password, $user['Password'])) {
            // Connexion réussie
            // Enregistrement des données de l'utilisateur en session
            $session = session();
            $userData = [
             
                'Nom' => $user['Nom'],
                'Prenom' => $user['Prenom'],
            ];
            $session->set($userData);

            return redirect()->to('/reclamation/create');
        } else {
            // Identifiants incorrects
            return redirect()->to('/')->with('error', 'Identifiants de connexion invalides');
        }
    }

    public function register()
    {
        return view('auth/register');
    }

    public function processRegister()
    {
        // Validation des données du formulaire
        $validation = \Config\Services::validation();
        $validation->setRules([
        
            'Nom' => 'required',
            'Prenom' => 'required',
            'Adresse' => 'required',
            'Sexe' => 'required|in_list[M,F]',
            'Profession' => 'required',
            'DateNaissance' => 'required|valid_date',
            'Password' => 'required|min_length[8]',
            'Password_confirm' => 'required|matches[Password]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/register')->withInput()->with('errors', $validation->getErrors());
        }

        // Récupération des données du formulaire
        $userData = [
            
            'Nom' => $this->request->getPost('Nom'),
            'Prenom' => $this->request->getPost('Prenom'),
            'Adresse' => $this->request->getPost('Adresse'),
            'Sexe' => $this->request->getPost('Sexe'),
            'Profession' => $this->request->getPost('Profession'),
            'DateNaissance' => $this->request->getPost('DateNaissance'),
            'Password' => password_hash($this->request->getPost('Password'), PASSWORD_DEFAULT),
        ];
        

        // Enregistrement de l'utilisateur dans la base de données
        $utilisateursModel = new Utilisateurs();
     
        $utilisateursModel->insert($userData);

        return redirect()->to('/')->with('success', 'Registration successful. Please login.');
    }

    public function logout()
    {
        // Destruction de la session
        $session = session();
        $session->destroy();

        return redirect()->to('/');
    }
}

