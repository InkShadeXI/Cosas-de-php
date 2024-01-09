<?php
// src/Profesor.php
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity] 
#[ORM\Table(name: 'profesor')]
class Profesor
{
    #[ORM\Id]
    #[ORM\Column(type:'integer', name:'codigo')]
    #[ORM\GeneratedValue]
    private $codigo;

    #[ORM\Column(type:'string', name:'nombre')]
    private $nombre;

    #[ORM\Column(type:'string', name:'especialidad')]
	private $especialidad;

    #[ORM\Column(type:'integer', name:'aprobados')]
	private $aprobados;


	
	public function getCodigo()
    {
        return $this->codigo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
	public function getEspecialidad()
    {
        return $this->especialidad;
    }

    public function setEspecialidad($especialidad)
    {
        $this->especialidad = $especialidad;
    }
	public function getAprobados()
    {
        return $this->aprobados;
    }

    public function setAprobados($aprobados)
    {
        $this->aprobados = $aprobados;
    }		
}