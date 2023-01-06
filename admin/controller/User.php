<?php


namespace Admin\Controller;

use Model\UserModel;

include_once('scripts/helper/userHelper.php');

class User extends Base
{
    public function show($req)
    {
        $users = findUsers();

        $this->view->render($this->getTemplate('user'), [
            'users' =>  $users
        ]);
    }
    public function openFormLogin($req)
    {
        $params = explode('/', $req);
        $status = !empty($params[0]) ?  $params[0] : '';
        $msg = !empty($params[1]) ?  $params[1] : '';

        $this->view->render($this->getTemplate('login'), [
            'msg' . $status => $msg,
        ]);
    }
    public function openFormRegister($req)
    {
        $path = $this->getTemplate('register');
        $this->view->render($path);
    }

    public function register($req)
    {
        $template = 'register';
        $username = $_POST['User']['username'];
        $pass = $_POST['User']['pass'];

        if ($username) {
            $userDB = findUser($_POST['User']['username']);

            if (!$userDB && $pass) {
                $pass = password_hash($_POST['User']['pass'], PASSWORD_DEFAULT);
                $resultAddUser = addUser(new UserModel($username,  $pass, $_POST['User']['email']));

                if ($resultAddUser == 'SUCCESS') {
                    header("location:$this->baseURL/site/user/open-form-login/1/Đăng kí thành công hãy login");
                }
                exit();
            }

            $this->view->render($this->getTemplate($template), array(
                'msgError' => 'Username ' . $username . ' Already in Exits ',
            ));
        }
    }

    public function login($req)
    {
        $username = '';
        if (isset($_POST['username'])) {
            $username = $_POST['username'];
            $userDB = findUser($username);

            if ($userDB && password_verify($_POST['pass'], $userDB->Pass)) {
                $_SESSION['userDB'] = $userDB;
                setcookie('msg', 'Thành công thành công đại thành công');
                header("location:$this->baseURL/site/task/show/1/Login thành công");
                exit();
            }
        }
        $this->view->render($this->getTemplate('login'), array(
            'msgError' => 'Login faild ' . $username,
        ));
    }

    public function logout($req)
    {
        if (isset($_SESSION['userDB'])) {
            session_unset();
            session_destroy();
        }
        header("location:$this->baseURL/admin/user/open-form-login/0/Hãy đăng nhập lại");
    }
}
