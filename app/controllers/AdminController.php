<?php

class AdminController extends BaseController {

	public function __construct()
    {
        $this->beforeFilter('auth');
        $this->beforeFilter('admin');
    }


	public function getUsers(){
		$users = User::where('id', '>', '0')->orderBy('surname1', 'asc')->get();
		return View::make('admin.admin_users')->with('users',$users);
	}

	public function getDelete($user_id)
	{

		$user = User::find($user_id);

		if(is_null($user))
		{
			return Redirect::to('/admin/users');
		}

		$user->delete();

		return Redirect::to('/admin/users')->with('success', 'Usuario eliminado correctamente.');
	}

	public function getEdit($user_id)
	{

		$user = User::find($user_id);

		if(is_null($user))
		{
			return Redirect::to('/admin/users');
		}

		return View::make('admin.edit_users')->with('user', $user);
	}

	public function postEdit($user_id){

		$user = User::find($user_id);

		if(is_null($user))
		{
			return Redirect::to('/admin/users');
		}

		// Obtenemos los datos
		// trim: función devuelve una cadena con los espacios en blanco eliminados del inicio y final
		$name = strip_tags(trim(Input::get('name')));
		$surname1 = strip_tags(trim(Input::get('surname1')));
		$surname2 = strip_tags(trim(Input::get('surname2')));
		$email = strip_tags(mb_strtolower(trim(Input::get('email'))));
		$role = strip_tags(Input::get('role'));
		$activated = strip_tags(Input::get('activated'));

		$data = array(
			'nombre' => $name,
			'apellido1' => $surname1,
			'apellido2' => $surname2,
			'email' => $email,
			'rol' => $role,
			'activado' => $activated
		);

		//Reglas de entrada
		$rules = array(
			'nombre' => 'required|min:2|max:40',
			'apellido1' => 'required|min:2|max:50',
			'apellido2' => 'required|min:2|max:50',
			'email' => 'required|email|min:6|max:200|unique:users,email,' . $user_id
		);
		//Mensajes de error
		$messages = array(
			 'required' => 'El campo :attribute es obligatorio.',
			 'min' => 'El campo :attribute no puede tener menos de :min carácteres.',
			 'email' => 'El campo :attribute debe ser un email valido.',
			 'max' => 'El campo :attribute no puede tener mas de :max carácteres.'
		);

		//Validamos pasando los datos introducidos y las reglas de entrada
		$validator = Validator::make($data, $rules, $messages);

		if ($validator->fails())
    	{	
        	$errores = $validator->errors()->toArray();
 			$msg = "";

			// Por motivos estéticos se enviáran sólo los dos primeros errores
			$n_errores = 2;
			if (array_key_exists('nombre', $errores) && ($n_errores-- > 0)) {
				$msg .= $errores['nombre'][0]."<br />";
			}
			if (array_key_exists('apellido1', $errores) && ($n_errores-- > 0)) {
				$msg .= $errores['apellido1'][0]."<br />";
			}
			if (array_key_exists('apellido2', $errores) && ($n_errores-- > 0)) {
				$msg .= $errores['apellido2'][0]."<br />";
			}
			if (array_key_exists('email', $errores) && ($n_errores-- > 0)) {
				$msg .= $errores['email'][0]."<br />";
			}
			if($n_errores < 0) $msg .= "...";

			// La validación del formulario no ha sido satisfactoria. 
			//Redireccionamos a la página anterior con los datos enviados y con un mensaje de error
			return Redirect::back()->with('error', $msg);
		}else
		{
			// Validación correcta
			//Modificar usuario
			$user->name = $data['nombre'];
			$user->surname1 = $data['apellido1'];
			$user->surname2 = $data['apellido2'];
			$user->email = $data['email'];
			$user->role = $data['rol'];
			$user->activated =$data['activado'];
			$user->save();

			return Redirect::to('/admin/users')->with('success', 'Usuario modificado correctamente.');
		}
	}
/*
	public function getFiles($user = null)
    {
        $users = User::where('id', '>', '0')->orderBy('user','asc')->get();
        $shared_files = User::find(0)->files()->orderBy('name','asc')->get();

        if(is_null($user)) {
            // Vista gestión archivos general
            return View::make('admin.admin_files')->with('users', $users)->with('shared_files', $shared_files);
        }

        $exists = User::where('user', '=', $user)->count();

        if ($exists) {
            
            $files = User::where('user', '=', $user)->first()->files()->orderBy('name','asc')->get();
            // Vista gestión archivos de $user
            return View::make('admin.admin_files')->with('users', $users)->with('shared_files', $shared_files)->with('files', $files);
        }

        // Redirección vista general si usuario no existe
        return Redirect::to('/admin/files')->with('users', $users)->with('shared_files', $shared_files);
    }*/
}