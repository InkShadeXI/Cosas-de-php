<?php
// src/Modulo.php
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity] 
#[ORM\Table(name: 'modulo')]
class Modulo
{
    #[ORM\Id]
    #[ORM\Column(type:'string', name:'nombre')]
    #[ORM\GeneratedValue]
    private $nombre;

    #[ORM\Column(type:'integer', name:'horas')]
    private $horas;

    #[ORM\Column(type:'integer', name:'alumnos')]
    private $alumnos;

    #[ORM\OneToOne(targetEntity:'Profesor')]
    #[ORM\JoinColumn(name:'profesor', referencedColumnName:'id')]
	private $profesor;
	
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getHoras()
    {
        return $this->horas;
    }

    public function setHoras($horas)
    {
        $this->horas = $horas;
    }

    public function getAlumnos()
    {
        return $this->alumnos;
    }

    public function setAlumnos($alumnos)
    {
        $this->alumnos = $alumnos;
    }

    public function getProfesor()
    {
        return $this->profesor;
    }

    public function setProfesor($profesor)
    {
        $this->profesor = $profesor;
    }
	
}