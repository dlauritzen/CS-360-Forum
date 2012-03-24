<?php

namespace DLauritz\Forum\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ForumController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('DLauritzForumForumBundle:Forum:index.html.twig');
    }
}
