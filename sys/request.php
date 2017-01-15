<?php
	namespace X\Sys;
	/**
	*
	* Request: Translate URL
	* 	to controller, action and parameters
	*
	* @author: Mire <mireia.cano.ar@gmail.com>
	* @package: sys
	*
	**/

	class Request{
		//creem array static per poder accedir en qualsevol moment
		static private $query=array(); // podrem accedir a la variable -> Request::$query

		static function exploding(){
			//converteix l'string en un array
			$array_query=explode('/', $_SERVER['REQUEST_URI']); //explode serveix per convertir un string en un array
			//array_shift elimina el primer elemento de la izquierda
			array_shift($array_query);
			//Si la ultima posición del array esta vacio...
			if(end($array_query)==""){
				//...array_pop borra el contenido
				array_pop($array_query);
			}
			//si es base no fem res, pero si no ho es fem
			//array_shift una altra vegada
			$dir=dirname($_SERVER['PHP_SELF']);

			if($dir=='/'.$array_query[0]){
				array_shift($array_query);
			}
			self::$query=$array_query;
			
		}

		static function getVariable(){
			//self = this per elements statics
			return array_shift(self::$query);
		}

		static function getParams(){
			if (count(self::$query)>0){
				if((count(self::$query)%2)==0){
					for ($i=0; $i<count(self::$query); $i++) {
						if (($i%2)==0) {
							$key[]=self::$query[$i];
						}
						else{
							$value[]=self::$query[$i];
						}
					}
					$result=array_combine($key, $value);
					return $result;
				}
			}

		}

		
	}