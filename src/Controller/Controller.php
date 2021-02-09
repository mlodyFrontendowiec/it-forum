<?php

declare(strict_types=1);

namespace App\Controller;

use App\View;
use App\Model\Model;

class Controller
{
    private array $get ;
    private array $post;
    private View $view;
    private Model $model;
    public function __construct(array $data)
    {
        $this->get =$data['get'];
        $this->post =$data['post'];
        $this->view = new View();
        $this->model = new Model();
    }
    public function showPage():void
    {
        switch ($this->get['action'] ?? 'main') {
            case 'main':
            $this->view->render('main', $this->model->getNews());
                break;
            case 'login':
            $this->view->render('login');
                break;
            case 'articles':
            $this->view->render('articles', $this->model->getArticles());
                break;
            case 'reviews':
            $this->view->render('reviews', $this->model->getReviews());
                break;
            case 'forum':
            $this->view->render('forum');
                break;
            case 'register':
            $this->view->render('register');
                break;
            case 'validateRegister':
            $this->model->validateRegister($this->post);
                break;
            case 'requestLogin':
            $this->model->requestLogin($this->post);
                break;
            case 'logout':
            $this->model->logoutUser();
                break;
            default:
            $this->view->render('main');
                break;
        }
    }
}
