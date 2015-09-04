<?php

/*
* Operaciones relacionadas con la administración de usuarios
*/
class UserController extends BaseController {

	public function __construct()
    {
        $this->beforeFilter('guest');
    }

    public function getIndex()
	{
		//Vista del formulario de login
		return View::make('/');
	}

	public function getRegister()
	{
		//Vista del formulario de registro
		return View::make('users.register');
	}

	public function postRegister()
	{
		// Obtenemos los datos del registro
		// trim: función devuelve una cadena con los espacios en blanco eliminados del inicio y final
		$name = strip_tags(trim(Input::get('name')));
		$surname1 = strip_tags(trim(Input::get('surname1')));
		$surname2 = strip_tags(trim(Input::get('surname2')));
		$email = strip_tags(mb_strtolower(trim(Input::get('email'))));
		$password = strip_tags(Input::get('password'));
		$repassword = strip_tags(Input::get('repassword'));

		$data = array(
			'nombre' => $name,
			'apellido1' => $surname1,
			'apellido2' => $surname2,
			'email' => $email,
			'password' => $password,
			'password2' => $repassword
		);

		//Reglas de entrada
		$rules = array(
			'nombre' => 'required|min:2|max:40',
			'apellido1' => 'required|min:2|max:50',
			'apellido2' => 'required|min:2|max:50',
			'email' => 'required|email|min:6|max:200|unique:users',
			'password' => 'required|min:6|max:30|same:password2',
			'password2' => 'required|min:6|max:30'
		);
		//Mensajes de error
		$messages = array(
			 'required' => 'El campo :attribute es obligatorio.',
			 'min' => 'El campo :attribute no puede tener menos de :min carácteres.',
			 'email' => 'El campo :attribute debe ser un email valido.',
			 'max' => 'El campo :attribute no puede tener mas de :max carácteres.',
			 'unique' => 'El :attribute ya se encuentra registrado.',
			 'same' => 'El :attribute y la confirmación deben coincidir.'
		);

		//Validamos pasando los datos introducidos y las reglas de entrada
		$validator = Validator::make($data, $rules, $messages);

		if ($validator->fails())
    	{	
        	$errores = $validator->errors()->toArray();
 			$error = "";

			// Por motivos estéticos se enviáran sólo los dos primeros errores
			$n_errores = 2;
			if (array_key_exists('nombre', $errores) && ($n_errores-- > 0)) {
				$error .= $errores['nombre'][0]."<br />";
			}
			if (array_key_exists('apellido1', $errores) && ($n_errores-- > 0)) {
				$error .= $errores['apellido1'][0]."<br />";
			}
			if (array_key_exists('apellido2', $errores) && ($n_errores-- > 0)) {
				$error .= $errores['apellido2'][0]."<br />";
			}
			if (array_key_exists('email', $errores) && ($n_errores-- > 0)) {
				$error .= $errores['email'][0]."<br />";
			}
			if (array_key_exists('password', $errores) && ($n_errores-- > 0)) {
				$error .= $errores['password'][0]."<br />";
			}
			if (array_key_exists('password2', $errores) && ($n_errores-- > 0)) {
				$error .= $errores['password2'][0]."<br />";
			}
			if($n_errores < 0) $error .= "...";

			// La validación del formulario no ha sido satisfactoria. 
			//Redireccionamos a la página anterior con los datos enviados y con un mensaje de error
			return Redirect::back()->with('error', $error);
		}else
		{
			// Validación correcta
			//Crear usuario
			$user = new User;
			$user->name = $data['nombre'];
			$user->surname1 = $data['apellido1'];
			$user->surname2 = $data['apellido2'];
			$user->email = $data['email'];
			$user->password = Hash::make($data['password']);
			$user->save();

			return Redirect::to('/')->with('success', 'Usuario creado correctamente. Debe esperar a ser activado para poder ingresar');
		}
		 
 	}
}