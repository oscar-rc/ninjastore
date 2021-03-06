<?php
class PersistenciaUsuarioTel
{
	public function agregar($obj, $conex) {
		$id = $obj->getId();
		$telefono = $obj->getTelefono();

		$sql = "INSERT INTO USUARIOTEL (ID,TELEFONO) VALUES 
		(:id, :telefono)";
		$result = $conex->prepare($sql);		
		$result->execute(array(":id" => $id, ":telefono" => $telefono));
		if($result) {
			return(true);
		}else{
			return(false);
		}
	}
	public function eliminar($obj, $conex) {
		$ID = $obj->getId();      		
		$sql = "DELETE FROM USUARIOTEL WHERE ID=:ID";
		$result = $conex->prepare($sql);
		$result->execute(array(":ID"=>$ID));
		if($result) {
			return(true);
		}else{
			return(false);
		}
	}
	public function consTodos($obj, $conex){
		$id = $obj->getId();
		$sql = "SELECT TELEFONO FROM USUARIOTEL WHERE ID=:id";
		$result = $conex->prepare($sql);
		$result->execute(array(":id" => $id));
		$resultados=$result->fetchAll();
		return $resultados;
	}
}