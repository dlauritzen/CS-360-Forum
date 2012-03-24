<?php

namespace DLauritz\Forum\ForumBundle\Entity;

class Category {
	protected $name;
	protected $description;
    /**
     * @var integer $id
     */
    private $id;


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
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * @var DLauritz\Forum\ForumBundle\Entity\Forum
     */
    private $forums;

    public function __construct()
    {
        $this->forums = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add forums
     *
     * @param DLauritz\Forum\ForumBundle\Entity\Forum $forums
     */
    public function addForum(\DLauritz\Forum\ForumBundle\Entity\Forum $forums)
    {
        $this->forums[] = $forums;
    }

    /**
     * Get forums
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getForums()
    {
        return $this->forums;
    }
}