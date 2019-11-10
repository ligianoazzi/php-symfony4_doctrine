<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EspecieRepository")
 */
class Especie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50)
     */
    private $nome;
    /**
     * @return mixed
     */
    
    public function getId()
    {
        return $this->id;
    }
    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }
    /**
     * @param string $nome
     * @return Especie
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }
}
