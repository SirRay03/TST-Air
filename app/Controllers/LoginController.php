<?php
namespace App\Controllers;
use App\Models\Login;
class LoginController extends BaseController
{
    public function index()
    {
        return view('login');
    }
    public function loginProcess()
    {
        $model = model(Login::class);
        $email = $this->request->getPost('email');
        $password = md5($this->request->getPost('password'));
        $cek = $model->loginProcess($email, $password);
        if ($cek > 0) {
            session()->set('log', true);
            return redirect()->to('/');
        } else {
            return redirect()->to('/login');
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}