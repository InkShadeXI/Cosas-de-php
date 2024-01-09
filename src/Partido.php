<?php
// src/Partido.php
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity] 
#[ORM\Table(name: 'partido')]
class Partido{
    #[ORM\Id]
    #[ORM\Column(type:'integer', name:'id')]
    #[ORM\GeneratedValue]
    private $id;
   
    #[ORM\OneToOne(targetEntity:'Equipo')]
    #[ORM\JoinColumn(name:'local', referencedColumnName:'id')]
	private $local;

    #[ORM\OneToOne(targetEntity:'Equipo')]
    #[ORM\JoinColumn(name:'visitante', referencedColumnName:'id')]
	private $visitante;

    #[ORM\Column(type:'integer', name:'goles_local')]
	private $goles_local;
    
    #[ORM\Column(type:'string', name:'goles_visitante')]
    private $goles_visitante;

    #[ORM\Column(type:'date', name:'fecha')]
    private $fecha;
	
	public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getLocal()
    {
        return $this->local;
    }

    public function setLocal($local)
    {
        $this->local = $local;
    }
	public function getVisitante()
    {
        return $this->visitante;
    }

    public function setVisitante($visitante)
    {
        $this->visitante = $visitante;
    }
	public function getGolesLocal()
    {
        return $this->goles_local;
    }
	
	public function setGolesLocal($goles_local)
    {
        $this->goles_local = $goles_local;
    }
	public function getGolesVisitante()
    {
        return $this->goles_visitante;
    }
	
	public function setGolesVisitante($goles_visitante)
    {
        $this->goles_visitante = $goles_visitante;
    }  	

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
}