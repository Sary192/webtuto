<?php

class MainController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

    public function getIndex()
    {
        return View::make('main.home');
    }
    public function getTeoria()
    {
        return View::make('main.teoria');
    }
    public function getWhile()
    {
        return View::make('main.while');
    }
    public function getTuring()
    {
        return View::make('main.turing');
    }
    public function getPassword($user_id)
    {
        $user = User::find($user_id);

        if(is_null($user))
        {
            return Redirect::to('/main');
        }

        return View::make('main.password')->with('user', $user);
    }
    public function postPassword($user_id)
    {
        // Obtenemos los datos
        $oldpassword = strip_tags(Input::get('oldpassword'));
        $password1 = strip_tags(Input::get('password'));
        $password2 = strip_tags(Input::get('repassword'));

        $data = array(
            'password1' => $password1,
            'password2' => $password2
        );

        //Reglas de entrada
        $rules = array(
            'password1' => 'required|min:6|max:30|same:password2',
            'password2' => 'required|min:6|max:30|same:password1'
        );
        //Mensajes de error
        $messages = array(
            'required' => 'El campo :attribute es obligatorio.',
            'min' => 'El campo :attribute no puede tener menos de :min carácteres.',
            'max' => 'El campo :attribute no puede tener mas de :max carácteres.',
            'same' => 'El :attribute y la confirmación deben coincidir.'
        );

        //Validamos pasando los datos introducidos y las reglas de entrada
        $validation = Validator::make($data, $rules, $messages);

        if ($validation->fails()) {

            $errores = $validation->errors()->toArray();
            if (array_key_exists('password1', $errores)) {
                $error = $errores['password1'][0];
            }
            else if (array_key_exists('password2', $errores)) {
                $error = $errores['password2'][0];
            }
            return Redirect::back()->with('error', $error);
        }

        // Credenciales
        $credenciales = [
            "email" => Auth::user()->email,
            "password" => $oldpassword
        ];

        if (Auth::validate($credenciales)) {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($password1);
            // Cambiamos contraseña
            $user->save();
            return Redirect::back()->with('success', 'La contraseña ha sido cambiada correctamente.');
        }

        // Validación incorrecta
        return Redirect::back()->with('error', 'La contraseña actual introducida es incorrecta.');
    }

}
