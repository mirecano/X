<?php
	namespace X\Sys;

	/**
	*
	* Control de sessions i aconseguir que aquestes no es repeteixin
	* ni es sobreescriguin si ja existeixen
	*
	**/

	class Session{
		//inicia sessio dintre del sistema
		static function init(){
			session_start();
			self::set('id', session_id());
		}

		static function set($key,$value){
			$SESSION[$key]=$value;

		}

		static function get($key){
			if(self::exists($key)){
				return $_SESSION[$key];
			}else{
				return null;
			}
		}

		static function exists($key){
			if (array_key_exists($key, $_SESSION)){
				return true;
			}else{
				return false;
			}
		}

		static function del($key){
			if(self::exists($key)){
				//unset es esborrar
				unset($_SESSION[$key]);
			}
		}

		//cuando desconectamos la session
		static function destroy(){
			session_destroy();
		}
	}