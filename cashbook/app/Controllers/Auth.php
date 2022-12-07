<?php

    namespace App\Controllers;

    use App\Controllers\BaseController;
    use App\Models\UserModel;
    use App\Libraries\Hash;
    use PHPUnit\Framework\MockObject\Exception;


    class Auth extends BaseController{

        public function __construct(){
            
            helper(['url', 'form']);

        }

        /**
         * Exibindo página de login
         */
        public function index(){

            return view('auth/login');

        }

        /**
         * Exibindo página de registro
         */
        public function register(){

            return view('auth/register');

        }

        /**
         * Salvando um novo usuário no banco de dados
         */
        public function registerUSer(){

            $validated = $this -> validate([

                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Seu nome completo é obrigatório'
                    ]
                ],

                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Seu email é obrigatório',
                        'valid_email' => 'Seu email já está em uso!'
                    ]
                ],

                'password' => [
                    'rules' => 'required|min_length[5]|max_length[20]',
                    'errors' => [
                        'required' => 'Sua senha é obrigatório',
                        'min_length' => 'A senha deve ter 5 caracteres',
                        'max_length' => 'A senha não pode ter mais de 20 caracteres'
                    ]
                ],

                'passwordConf' => [
                    'rules' => 'required|min_length[5]|max_length[20]|matches[password]',
                    'errors' => [
                        'required' => 'Confirmar a senha é obrigatório',
                        'min_length' => 'A senha deve conter 5 caracteres',
                        'max_legth' => 'Sua senha não pode ter mais de 20 caracters',
                        'matches' => 'A senha de confirmação deve ser igual a senha!'
                    ]
                ],


            ]);

            if(!$validated){

                return view('auth/register', ['validation' => $this -> validator]);

            }

            // Salvando o usuário

            $name = $this -> request -> getPost('name');
            $email = $this -> request -> getPost('email');
            $password = $this -> request -> getPost('password');
            $passwordConf = $this -> request -> getPost('passwordConf');

            $data = [

                'name' => $name,
                'email' => $email,
                'password' => Hash::encrypt($password)
                
            ];

            $userModel = new \App\Models\UserModel();
            $query = $userModel -> insert($data);

            if(!$query){

                return redirect() -> back() -> with('fail', 'Falha ao salvar usuário!');

            }else{
                return redirect() -> back() -> with('success', 'Usuário salvo com sucesso!');
            }
            

        }

        /**
         * Método de login
         */
        public function loginUser(){

            $validated = $this -> validate([
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Seu email é obrigatório',
                        'valid_email' => 'Esse email já está sendo usado!'
                    ]
                ],

                'password' => [
                    'rules' => 'required|min_length[5]|max_length[20]',
                    'errors' => [
                        'required' => 'Sua senha é obrigatória',
                        'min_length' => 'A senha deve ter 5 caracteres',
                        'max_length' => 'A senha não pode ter mais de 20 caracteres'
                    ]
                ]
            ]);

            if(!$validated){

                return view('auth/login', ['validation' => $this -> validator]);

            }else{

                $email = $this -> request -> getPost('email');
                $password = $this -> request -> getPost('password');

                $userModel = new UserModel();
                $userInfo = $userModel -> where('email', $email) -> first();

                $checkPassword = Hash::check($password, $userInfo['password']);

                if(!$checkPassword){
                    session() -> setFlashdata('fail', 'Senha incorreta!');
                    return redirect() -> to('auth');
                }else{
                    $userId = $userInfo['id'];

                    session() -> set('loggedInUser', $userId);
                    return redirect() -> to('dashboard');
                }
            }

        }

        public function logout(){

            if(session() -> has('loggedInUser')){
                session() -> remove('loggedInUser');
            }

            return redirect() -> to('login?access=loggedout') -> with('fail', 
            'Você está desconectaado!');

        }


    }