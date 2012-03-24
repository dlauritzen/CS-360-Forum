<?php

namespace DLauritz\Forum\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DashboardController extends Controller
{
    
    public function viewAction()
    {
		$this->get('session')->setFlash('notice', "It works!");
        return $this->render('DLauritzForumAdminBundle:Dashboard:view.html.twig');
    }
}
