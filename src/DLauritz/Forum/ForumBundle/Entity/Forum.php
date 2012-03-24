<?php

namespace DLauritz\Forum\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DLauritz\Forum\ForumBundle\Entity\Forum
 */
class Forum
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @var DLauritz\Forum\ForumBundle\Entity\Forum
     */
    private $parent;


    /**
     * Set parent
     *
     * @param DLauritz\Forum\ForumBundle\Entity\Forum $parent
     */
    public function setParent(\DLauritz\Forum\ForumBundle\Entity\Forum $parent)
    {
        $this->parent = $parent;
    }

    /**
     * Get parent
     *
     * @return DLauritz\Forum\ForumBundle\Entity\Forum 
     */
    public function getParent()
    {
        return $this->parent;
    }
    /**
     * @var DLauritz\Forum\ForumBundle\Entity\Category
     */
    private $category;


    /**
     * Set category
     *
     * @param DLauritz\Forum\ForumBundle\Entity\Category $category
     */
    public function setCategory(\DLauritz\Forum\ForumBundle\Entity\Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get category
     *
     * @return DLauritz\Forum\ForumBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * @var DLauritz\Forum\ForumBundle\Entity\Forum
     */
    private $children;

    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add children
     *
     * @param DLauritz\Forum\ForumBundle\Entity\Forum $children
     */
    public function addForum(\DLauritz\Forum\ForumBundle\Entity\Forum $children)
    {
        $this->children[] = $children;
    }

    /**
     * Get children
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }
}