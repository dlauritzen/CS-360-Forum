<?php

namespace DLauritz\Forum\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use DLauritz\Forum\UserBundle\Entity\User;

class UserController extends Controller {

	public function loginAction($_format) {
		$request = $this->getRequest();
		$session = $request->getSession();
		
		if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
			$error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
		} else {
			$error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
			$session->remove(SecurityContext::AUTHENTICATION_ERROR);
		}
		
		// DEBUG
		$factory = $this->get('security.encoder_factory');
		$user = new User();
		$encoder = $factory->getEncoder($user);
		$password = $encoder->encodePassword('k326h0xc', $user->getSalt());
		// END: DEBUG
		
		return $this->render('DLauritzForumUserBundle:User:login.'.$_format.'.twig', array(
			'last_username' => $session->get(SecurityContext::LAST_USERNAME),
			'error' => $error,
			'hashme' => $password
		));
	}
    
    public function viewProfileAction($username, $_format) {
    	$security = $this->get('security.context');
    	$user = null;
    	
    	if ($username == "self") {
    		$user = $this->get('security.context')->getToken()->getUser();
    	} else {
    		$user = $this->getDoctrine()->getRepository('DLauritzForumUserBundle:User')
    				->findOneByUsername($username);
    		if (!$user) {
    			$this->get('session')->setFlash('notice', "User ".$username." does not exist.");
    			$this->redirect($this->generateUrl('forum_index'));
    		}
    	}
    	
    	return $this->render('DLauritzForumUserBundle:User:view.' . $_format . '.twig', array (
    		'user' => $user
    	));
    }
    
    public function editProfileAction($_format) {
    	$user = new User();
    	
    	$form = $this->createFormBuilder($user)
    		->add('email', 'email')
    		->add('old_pass', 'password', array('options' => array('label' => 'Old Password')))
    		->add('password', 'repeated', array(
    			'type' => 'password',
    			'invalid_message' => 'The password fields must match.',
    			'options' => array('label' => 'New Password'),
    			'first_name' => 'new_password',
    			'second_name' => 'confirm_new_password'
    		))->getForm();
    	
    	if ($request->getMethod() == 'POST') {
    		$form->bindRequest($request);
    		
    		if ($form->isValid()) {
    			// Do stuff
    			$this->get('session')->setFlash('notice', "Profile updated.");
    			return $this->redirect($this->generateUrl('user_profile_view'));
    		}
    	}
    	
    	return $this->render('DLauritzForumUserBundle:User:edit.'.$_format.'.twig', array(
    		'user' => $user
    	));
    }
    
}
