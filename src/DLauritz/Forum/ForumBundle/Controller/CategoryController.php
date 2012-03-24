<?php

namespace DLauritz\Forum\ForumBundle\Controller;

use DLauritz\Forum\ForumBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class CategoryController extends Controller
{
    
    public function indexAction($action, $params, $_format)
    {
    	if ($action == "view") {
    		return $this->viewAction($params, $_format);
    	} else {
	    	$cats = $this->getDoctrine()->getRepository('DLauritzForumForumBundle:Category')
    		->findAll();
        	return $this->render('DLauritzForumForumBundle:Category:index.'.$_format.'.twig', array( "categories" => $cats));
        }
    }
    
    public function viewAction($id, $_format)
    {
    	$cat = $this->getDoctrine()->getRepository('DLauritzForumForumBundle:Category')->find($id);
    	return $this->render('DLauritzForumForumBundle:Category:view.'.$_format.'.twig', array("cat" => $cat));
    }
}
