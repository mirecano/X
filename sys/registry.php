<?php

    namespace X\Sys;

    /**
    *
    * Utilitzem aquesta clase per registrar. Amb el getInstance 
    * comprovem si ja hi ha l'instància per no tornar a crearla. 
    * __set() és un mètode màgic que utilitzem com array associatiu,
    * clau valor
    **/


    class Registry{
        //tiene que soporar singleton y tiene que tener un array

        private $data = array();
        static $instance; //la instancia está feta a través d'un acces estàtic, esta variable és pública

        function __construct(){
            //métode de construcció
            $this->data=array();
            $this->loadConf();
        }

        //Afegir a registry amb funcions màgiques, les funcions màgiques serveixen per afegir/Donar metodes als valors per cuan s'estan utilitzar métodes d'afegir a l'array uns valors


        static function getInstance(){
			if(!(self::$instance instanceof self)){
				self::$instance=new self();
				return self::$instance;
			}else{
				return self::$instance;
			}
		}



        function __set($key,$value) //no es pot utilitzar el set sobre una variable que no existeix
        {
            if(!array_key_exists($key, $this->data)) //si no existeix a data l'afegim
            {
                $this->data[$key]=$value; //afegim l'array
            }
            else{

            }
        }

        //con el set estamos guardando la clave y el valor del array que hemos creado arriba en el constructor, si está vacío


        function __get($key){
            if(array_key_exists($key, $this->data)){
                return $this->data[$key]; //retorna el valor del data de la key
            }
            else{
                return null; //nos retornarà null cuando busquemos una key que no exista
            }
        }

        //con el get obtendremos la clave

        function __unset($key=null){ //que pueden poner parametro o no
            if(array_key_exists($key, $this->data)){
                unset($this->data[$key]);
            }
            else{
                unset($this->data);
            }
        }

        /**
        *
        *	Loads App configuration in Registry
        *
        *
		**/

        function loadConf(){
        	$file=APP.'config.json';
        	$jsonStr=file_get_contents($file);
        	//echo $jsonStr;
        	//convertir cadena en un array
        	$arrayJson=json_decode($jsonStr);
        	foreach ($arrayJson as $key => $value) {
                $this->data[$key]=$value;
            }
        }

    }
