<?php

namespace Admin\Controller;

use Scripts\Lib\View;

class Base
{
    public $view;
    public $baseURL;

    public function init()
    {
        $this->view = new View;
        $this->baseURL = $this->view->getBaseUrl();
    }

    public function getTemplate($template, $layout = '')
    {
        $layout = !empty($layout) ? $layout : 'main';
        return [
            'resource' => [
                'html' => 'admin/view/page/' . $template . '.php',
                'css' => 'admin/public/css/' . $template . '.css',
                'js' => 'admin/public/js/' . $template . '.js'
            ],
            'layout' => 'site/view/layout/' . $layout
        ];
    }

    public function auth($action)
    {
        if (in_array($action, $this->actionsRequireLogin()) && empty($_SESSION['userDB'])) {
            header("location:$this->baseURL/admin/user/open-form-login/0/Bạn phải đăng nhập để dùng action này");
            exit();
        }
    }

    public function actionsRequireLogin()
    {
        return ['deleteAll', 'delete', 'update', 'add'];
    }

    public static function showMsgError($msg)
    {
        $view = new View;
        $view->render(Self::getTemplate('error'), array(
            'message' => $msg,
        ));
    }
}
