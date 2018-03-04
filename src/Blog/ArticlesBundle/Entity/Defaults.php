<?php

namespace Blog\ArticlesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Defaults
 *
 * @ORM\Table(name="defaults")
 * @ORM\Entity(repositoryClass="Blog\ArticlesBundle\Repository\DefaultsRepository")
 */
class Defaults
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
   * @var string
   *
   * @ORM\Column(name="title", type="string", length=255)
   */
    private $title;

  /**
   * @var string
   *
   * @ORM\Column(name="author", type="string", length=255)
   */
  private $author;

  /**
   * @var string
   *
   * @ORM\Column(name="content", type="string", length=255)
   */
  private $content;
  
}

