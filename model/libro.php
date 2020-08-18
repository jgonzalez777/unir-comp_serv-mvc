<?php
class Libro
{
	private $pdo;
    
    public $id;
    public $titulo;
    public $autor;
    public $anio_publicacion;
    public $ciudad;
    public $pais;
    public $editorial;
    public $precio;
    public $fecha_creacion;
    public $fecha_modificacion;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM libro");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM libro WHERE id = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM libro WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE libro SET 
						titulo          		= ?, 
						autor        			= ?,
                        anio_publicacion        = ?,
						ciudad            		= ?, 
						pais 					= ?,
						editorial				= ?,
						precio 					= ?,
						fecha_modificacion		= ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->titulo, 
                        $data->autor,
                        $data->anio_publicacion,
                        $data->ciudad,
                        $data->pais,
                        $data->editorial,
                        $data->precio,
                        date('Y-m-d'),
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Libro $data)
	{
		try 
		{
		$sql = "INSERT INTO libro (titulo, autor, anio_publicacion, ciudad, pais, editorial, precio, fecha_creacion, fecha_modificacion) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->titulo, 
                    $data->autor,
                    $data->anio_publicacion,
                    $data->ciudad,
                    $data->pais,
                    $data->editorial,
                    $data->precio,
                    date('Y-m-d'),
                    date('Y-m-d')                    
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	//Setters    
		function set_id($id){      
			$this->id = $id;    
		}
		function set_titulo($titulo){      
			$this->titulo = $titulo;    
		}
		function set_autor($autor){      
			$this->autor = $autor;    
		}    
		function set_anio_publicacion($anio_publicacion){      
			$this->anio_publicacion = $anio_publicacion;    
		}
		function set_ciudad($ciudad){      
			$this->ciudad = $ciudad;    
		}
		function set_pais($pais){      
			$this->pais = $pais;    
		}
		function set_editorial($editorial){      
			$this->editorial = $editorial;    
		}
		function set_precio($precio){      
			$this->precio = $precio;    
		}
		function set_fecha_creacion($fecha_creacion){      
			$this->fecha_creacion = $fecha_creacion;    
		}
		function set_fecha_modificacion($fecha_modificacion){      
			$this->fecha_modificacion = $fecha_modificacion;    
		}   


	//Getters    
		function get_id(){      
			return $this->id;    
		} 
		function get_titulo(){      
			return $this->titulo;    
		}    
		function get_autor(){      
			return $this->autor;    
		}
		function get_anio_publicacion(){      
			return $this->anio_publicacion;    
		}
		function get_ciudad(){      
			return $this->ciudad;    
		}
		function get_pais(){      
			return $this->pais;    
		}
		function get_editorial(){      
			return $this->editorial;    
		}
		function get_precio(){      
			return $this->precio;    
		}
		function get_fecha_creacion(){      
			return $this->fecha_creacion;    
		}
		function get_fecha_modificacion(){      
			return $this->fecha_modificacion;    
		}
}