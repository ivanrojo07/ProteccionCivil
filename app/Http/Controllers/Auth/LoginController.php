<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->url=env("GLOBAL_API_URL");
        $this->apiUrl=$this->url.'CONTROLADOR/API/cuenta360/'; //http://pruebasauth.ml/api/auth/
        $this->image=$this->url.'storage/';  //Directorio de imágenes en API
        $this->client = new GuzzleClient(['base_uri'=>$this->apiUrl]);

        $this->usuario360 = [];
        $this->modulos360 = [
            "plataforma360" => null,
            "telemedicina_medico" => null,
            "telemedicina_paciente" => null,
            "facturacion" => null,
            "app360" => null,
            "mapagis" => null,
            "lineamientos" => null,
            "incidentes" => null,
            "plan_interno" => null,
            "videovigilancia" => null,
         ];

    }

    // Logearse en la plataforma proteccion civil
    public function loginPlataforma($request){
        $email = $request['email'];
        $password = $request['password'];
        $user = User::where('email',$email)->first();
        // Verificar si el usuario y contraseña conincide.
        $id360=9991336791;
        if (Auth::attempt(array('email' => $email, 'password' => $password))){
            // logearse a la aplicación con el usuario
            auth()->login($user, true);
            // dd(Auth::user()->name);
            
            session(['nombreusuario'=> $user->name]);
            session(['tipo_usuario'=> 1 ]);
            $menu = $this->obtenerMenu($id360);
            $menulateral = array();            
            array_push($menulateral, $menu->menus);
            session(['menulateral' => $menulateral]);
            
            return ['login' => true];
        }
        else {
            // Usuario y contraseña son invalidos. 
            // Retornamos al login con mensajes del evento.
            return ['login' => false];
        }
    }

    public function obtenerMenu($id360){
        //dd("obtener  menu");
        $data = [
            "id360"=>$id360
        ];
        //dd($data);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://plataforma911.ml/CONTROLADOR/API/cuenta360/get/menu",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array("content-type: application/json",),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        //dd($response);
        if($err){
            Session::flash('mensaje-error','Error con la conexión del servicio de sesión');
            return Redirect::to('/');
        }else{
            $menulateral = json_decode($response);
            //dd($menu->menus);
            return($menulateral);
        }
    }
    // logearse en plataforma claro 360
    public function claroLogin($request)
    {
        // USANDO API DE CLAROAUTH
        // try {
        //     // Creamos la solicitud con los headers y params
        //     $response = $this->client->request('POST', 'login',
        //     [
        //         'body' => json_encode([
        //             'correo' =>$request['email'],
        //             'contrasenia' => $request['password']
        //         ]),
        //         'headers' => ["Content-Type"=>"application/json"]
        //     ]);
        //     // Si hay respuesta correcta se guarda en una variable.
        //     $contents = json_decode($response->getBody()->getContents(),true);
        //     dd($contents);


        // } catch (\Exception $e) {

        //     // Si la api falla redirigimos al login con el mensaje de que lo intente más tarde.
        //     return ['login' => false, 'error' => 'Usuario no encontrado, por favor intente más tarde.'];
        // }
        // if ($contents['success']) {
        //     // dd($contents);

        //     $plan_interno_modulo = $contents['plan_interno'];
        //     $claro360 = $contents["claro360"];
        //     if (!empty($plan_interno_modulo)) {

        //         $user_db = User::where('email',$claro360['correo'])->first();
        //         // Verificar si el usuario existe y tiene contraseña
        //         if ($user_db && !empty($user_db->password)) {
        //             auth()->login($user_db, true);
        //             $this->setSessionJSON($contents);
        //             $user_db->api_token = $claro360['token'];
        //             $user_db->save();
        //         }
        //         else if($user_db && empty($user_db->password)){
        //             $this->setSessionJSON($contents);
        //             $user_db->api_token = $claro360['token'];
        //             $user_db->password = Hash::make($request['password']);

        //             $user_db->save();
        //             auth()->login($user_db,true);
        //         }
        //         else{
        //             $user = new User([
        //                 'name' => $claro360['nombre'],
        //                 'email' => $claro360['correo'],
        //                 'password' => Hash::make($request['password']),
        //                 'api_token' => $claro360['token']
        //             ]);
        //             $user->id = $claro360['id'];
        //             $user->save();
        //             auth()->login($user,true);
        //         }
        //         return ['login' => true];
                
        //     }
        //     else            {
        //         return ['login' => false, 'error' => 'Tu contraseña no es valida o no puedes acceder a este modulo.'];
        //     }

        // }
        // else{
        //     // Si la api falla redirigimos al login con el mensaje de que lo intente más tarde.
        //     return ['login' => false, 'error' => 'No puede acceder a este modulo.'];
        // }
        // CODIGO ALONSO
        $email = $request['email'];
        $password = $request['password'];
        $credenciales = ['correo' =>  $email,'contrasenia' => $password];
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://plataforma911.ml/CONTROLADOR/API/cuenta360/login",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($credenciales),
            CURLOPT_HTTPHEADER => array("content-type: application/json",),
        ));
        $response = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);
        if ($error){
            return ['login' => false, 'error' => 'Error con la conexión del servicio de sesión'];
        }else{
            $users = json_decode($response);//Se aplica el parse json a token
            //dd($users);
            if($users->success==true){
                $existingUser = User::where('email', $users->claro360->correo)->first();
                if ($existingUser) {
                    auth()->login($existingUser);
                    session(['tokenUsuario360'=>$users->claro360->token]);
                    session(['idUsuario360'=>$users->claro360->id]);
                    $id360 = $users->claro360->id;
                    $menu = $this->obtenerMenu($id360);
                    $menulateral = array();
                    array_push($menulateral, $menu->menus);
                    //dd($menulateral);
                    session(['menulateral' => $menulateral]);
                    $plataforma360urlBuenas = array();
                    $plataforma360aliasBuenas = array();
                    $plataforma360iconoBuenas = array();
                    if(!empty($users->plataforma360)){
                        for ($i=0; $i < count($users->plataforma360); $i++){
                            if(property_exists($users->plataforma360[$i], 'url')){
                                if(!in_array($users->plataforma360[$i]->url, $plataforma360urlBuenas)){
                                    array_push($plataforma360urlBuenas,$users->plataforma360[$i]->url);
                                    if(property_exists($users->plataforma360[$i], 'alias'))
                                        array_push($plataforma360aliasBuenas,$users->plataforma360[$i]->alias);
                                    else
                                        array_push($plataforma360aliasBuenas,'Plataforma 360');
                                    if(property_exists($users->plataforma360[$i], 'icono'))
                                        array_push($plataforma360iconoBuenas,$users->plataforma360[$i]->icono);
                                    else
                                        array_push($plataforma360iconoBuenas,'');
                                }
                            }
                        }
                    }
                    session(['CuantasPlataforma'=>count($plataforma360urlBuenas)]);
                    for ($i=0; $i < count($plataforma360urlBuenas); $i++){
                        session(['Plataforma360'.$i => $plataforma360urlBuenas[$i]]);
                        session(['Plataforma360Nom'.$i => $plataforma360aliasBuenas[$i]]);
                        session(['Plataforma360icono'.$i => $plataforma360iconoBuenas[$i]]);
                    }

                    if (!empty($users->empleados)){
                        if ($users->empleados[0]->logotipo!=null){
                            session(['logEmpresa' => $users->empleados[0]->logotipo]);
                        }else{
                            session(['logoEmpresa' => 'NO']);
                        }
                        if ($users->empleados[0]->empresa!=null){
                            session(['nombreEmpresa' => $users->empleados[0]->empresa]);
                        }else{
                            session(['nombreEmpresa' => 'NO']);
                        }
                        if ($users->empleados[0]->centro_trabajo!=null){
                            session(['sucursalEmpresa' => $users->empleados[0]->centro_trabajo]);
                        }else{
                            session()->put(['sucursalEmpresa' => 'NO']);
                        }
                    } else {
                        session(['logoEmpresa' => 'NO']);
                        session(['nombreEmpresa' => 'NO']);
                        session(['sucursalEmpresa' => 'NO']);
                    }
                    if(!empty($users->perfil)){
                        if($users->perfil[0]->img!=null)
                            session(['ImagenPerfil' => $users->perfil[0]->img]);
                        else
                            session(['ImagenPerfil' => 'NO']);
                        $preDireccionPerfil = $users->perfil[0]->direccion;
                        $preDireccionPerfil = str_replace("null","Sin Información",$preDireccionPerfil);        
                        session(['DireccionPerfil' => $preDireccionPerfil]);
                    }else{
                        session(['ImagenPerfil' => 'NO']);
                        session(['DireccionPerfil' => 'Sin Información']);
                    }
                    session(['nombreusuario' => $users->claro360->nombre]);
                    session(['nombreCompleto' => $users->claro360->nombre.' '.$users->claro360->apellido_paterno.' '.$users->claro360->apellido_materno]);
                    session(['correousuario' => $users->claro360->correo ]);
                    session(['tipo_usuario' => 1 ]);
                    return ['login' => true];
                } else {
                    $existingUser = new User();
                    $existingUser->name = $users->claro360->nombre." ".$users->claro360->apellido_paterno." ".$users->claro360->apellido_materno;
                    $existingUser->email = $users->claro360->correo;
                    $existingUser->password = bcrypt($password);
                    $existingUser->id = $users->claro360->id;
                    $existingUser->save();
                    auth()->login($existingUser);
                    session(['tokenUsuario360' => $users->claro360->token]);
                    session(['idUsuario360' => $users->claro360->id]);
                    $menu = $this->obtenerMenu( $users->claro360->id);
                    $menulateral = array();
                    array_push($menulateral, $menu->menus);
                    session(['menulateral' => $menulateral]);
                    $plataforma360urlBuenas = array();
                    $plataforma360aliasBuenas = array();
                    $plataforma360iconoBuenas = array();
                    if(!empty($users->plataforma360)){
                        for ($i=0; $i < count($users->plataforma360); $i++){
                            if(property_exists($users->plataforma360[$i], 'url')){
                                if(!in_array($users->plataforma360[$i]->url, $plataforma360urlBuenas)){
                                    array_push($plataforma360urlBuenas,$users->plataforma360[$i]->url);
                                    if(property_exists($users->plataforma360[$i], 'alias'))
                                        array_push($plataforma360aliasBuenas,$users->plataforma360[$i]->alias);
                                    else
                                        array_push($plataforma360aliasBuenas,'Plataforma 360');
                                    if(property_exists($users->plataforma360[$i], 'icono'))
                                        array_push($plataforma360iconoBuenas,$users->plataforma360[$i]->icono);
                                    else
                                        array_push($plataforma360iconoBuenas,'');
                                }
                            }
                        }
                    }
                    session(['CuantasPlataforma' => count($plataforma360urlBuenas)]);
                    for ($i=0; $i < count($plataforma360urlBuenas); $i++){
                        session(['Plataforma360'.$i => $plataforma360urlBuenas[$i]]);
                        session(['Plataforma360Nom'.$i => $plataforma360aliasBuenas[$i]]);
                        session(['Plataforma360icono'.$i => $plataforma360iconoBuenas[$i]]);
                    }
                    if (!empty($users->empleados)){
                        if ($users->empleados[0]->logotipo!=null){
                            session(['logoEmpresa' => $users->empleados[0]->logotipo]);
                        }else{
                            session(['logoEmpresa' => 'NO']);
                        }
                        if ($users->empleados[0]->empresa!=null){
                            session(['nombreEmpresa' => $users->empleados[0]->empresa]);
                        }else{
                            session(['nombreEmpresa' => 'NO']);
                        }
                        if ($users->empleados[0]->centro_trabajo!=null){
                            session(['sucursalEmpresa' => $users->empleados[0]->centro_trabajo]);
                        }else{
                            session(['sucursalEmpresa' => 'NO']);
                        }
                    }else{
                        session(['logoEmpresa' => 'NO']);
                        session(['nombreEmpresa' => 'NO']);
                        session(['sucursalEmpresa' => 'NO']);
                    }
                    if(!empty($users->perfil)){
                        if($users->perfil[0]->img!=null)
                            session(['ImagenPerfil' => $users->perfil[0]->img]);
                        else
                            session(['ImagenPerfil' => 'NO']);
                        $preDireccionPerfil = $users->perfil[0]->direccion;
                        $preDireccionPerfil = str_replace("null","Sin Información",$preDireccionPerfil);        
                        session(['DireccionPerfil' => $preDireccionPerfil]);
                    }else{
                        session(['ImagenPerfil' => 'NO']);
                        session(['DireccionPerfil' => 'Sin Información']);
                    }
                    session(['nombreusuario' => $users->claro360->nombre]);
                    session(['nombreCompleto' => $users->claro360->nombre.' '.$users->claro360->apellido_paterno.' '.$users->claro360->apellido_materno]);
                    session(['correousuario' => $users->claro360->correo ]);
                    session(['tipo_usuario' => 1 ]);
                    return ['login' => true];
                }
            }
            else{
                return ['login' => false, 'error' => 'Contraseña incorrecta.'];
            }
        }

    }
    /**
     * Obtain the user information from API.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request)
    {

        // dd($request->all());
        $request = $request->validate([
            
            'email' => 'required|string',  
            'password' => 'required|string',
        ]);
        $logueo_360 = $this->claroLogin($request);
        if ($logueo_360['login']) {
            return redirect()->route('inicio');
        }
        else{
            // $logueo_local = $this->loginPlataforma($request);
            // if ($logueo_local['login']) {
            //     return redirect()->route('inicio');
            // }
            // else{
                return redirect('/login')->with('error',$logueo_360['error']);
            // }
        }
        
    }
    // Terminar sesión del usuario
    public function logout (){
        // Limpiamos la Sessión
        \Session::flush();
        // Redirigimos a la pagina de login 
        // ya cerrando la sesión interna
        return redirect('/login')->with(Auth::logout());
    }

    public function getAccessToken(Request $request)
    {

        $token = $request->token;
        $user_id = $request->user_id;
        try{
            $response = $this->client->request('POST', 'access_token',
                [
                    'body' => json_encode([
                        "token" => "$token",
                        "id360" => "$user_id" 
                    ]),
                    'headers' => ["Content-Type"=>"application/json"]
                ]);
            // Si hay respuesta correcta se guarda en una variable.
            $content = json_decode($response->getBody()->getContents(),true);
        } catch (\Exception $e) {
            // Si la api falla redirigimos al login con el mensaje de que lo intente más tarde.
            return redirect('/login')->with('error','Usuario no encontrado, por favor intente más tarde.');
        }
        
        if ($content) {
            if ($content["success"]) {
                $access_token = $content["access_token"];
                return response()->json(['id360'=>$user_id,"access_token"=>$access_token],201);
            }
            else{
                 // Si la api falla redirigimos al login con el mensaje de que lo intente más tarde.
                return response()->json(['error'=>"token o id incorrecto"],403);
            }
        }else{
            // Si la api falla redirigimos al login con el mensaje de que lo intente más tarde.
            return response()->json(['error'=>"no se pudo comunicar con el servidor, intente mas tarde"],403);
        }
    }

    public function verificaCuenta360($user_id, $access_token){
        try {
            $request = $this->client->request('POST','validate/access_token',[
                'body' => json_encode([
                    'access_token' => $access_token,
                    'id360' => $user_id
                ]),
                'headers' => [
                    "Content-Type" => "application/json"
                ]

            ]);
            // Si hay respuesta correcta se guarda en una variable.
            $contents = json_decode($request->getBody()->getContents(),true);
            if ($contents['success']) {
                $plan_interno = $contents['plan_interno'];
                $claro360 = $contents["claro360"];
                $this->setSessionJSON($contents);

                if (!empty($plan_interno)) {
                    $existingUser = User::where("email",$claro360['correo'])->first();
                    if ($existingUser) {
                        auth()->login($existingUser, true);

                    }
                    else{
                        $newUser = new User([
                            'name' => $claro360['nombre'],
                            'email' => $claro360['correo'], 
                        ]);
                        $newUser->id = $claro360['id'];
                        $newUser->save();

                        auth()->login($newUser,true);
                    }
                    return redirect()->route('inicio');
                    
                }
                else
                {
                    // Si la api falla redirigimos al login con el mensaje de que lo intente más tarde.
                    session(['body'=>$contents]);
                    return redirect()->route('registrar_modulo');
                }
            }
            else{
                // Si la api falla redirigimos al login con el mensaje de que lo intente más tarde.
                return redirect('/login')->with('error','No puede acceder a este modulo. por favor verifica tu contraseña o tu plan para acceder');
            }
            
            
            
        } catch (Exception $e) {
            
            // Si la api falla redirigimos al login con el mensaje de que lo intente más tarde.
            return redirect('/login')->with('error','No puede acceder a este modulo. por favor verifica tu contraseña o tu plan para acceder');
        }
    }

    public function setSessionJSON($response)
    {
        $this->claro360 = $response['claro360'];

        if (!empty($response['plataforma360'])) {
            $this->modulos360['plataforma360'] = $this->limpiarPlataforma($response['plataforma360']);
        }
        if (!empty($response['telemedicina_medico'])) {
            $this->modulos360['telemedicina_medico'] = $response['telemedicina_medico'][0];
        }
        if (!empty($response['telemedicina_paciente'])) {
            $this->modulos360['telemedicina_paciente'] = $response['telemedicina_paciente'][0];
        }
        if (!empty($response['facturacion'])) {
            $this->modulos360['facturacion'] = $response['facturacion'][0];
        }
        if (!empty($response['app360'])) {
            $this->modulos360['app360'] = $response['app360'][0];
        }
        if (!empty($response['mapagis'])) {
            $this->modulos360['mapagis'] = $response['mapagis'][0];
        }
        if (!empty($response['lineamientos'])) {
            $this->modulos360['lineamientos'] = $response['lineamientos'][0];
        }
        if (!empty($response['incidentes'])) {
            $this->modulos360['incidentes'] = $response['incidentes'][0];
        }
        if (!empty($response['plan_interno'])) {
            $this->modulos360['plan_interno'] = $response['plan_interno'][0];
        }
        if (!empty($response['videovigilancia'])) {
            $this->modulos360['videovigilancia'] = $response['videovigilancia'][0];
        }

        session(['claro360' => $this->claro360]);
        session(['modulos360' => $this->modulos360]);

    }
    public function limpiarPlataforma($res)
    {
        // Array temporal
        $array_temp = [];
        // Recorremos el arreglo
        foreach ($res as $plataforma) {
            // (funcion array_search: busca la similitud de un string en el arreglo; array_column: busca dentro el arreglo las llaves alias) verifica que el alias no este en nuestro arreglo
            if(array_search($plataforma['alias'],array_column($array_temp,'alias')) === false){
                // de no estarlo agregamos el objeto al arreglo
                array_push($array_temp,$plataforma);
            }
        }
        // Retornamos el array
        return $array_temp;
    }
}
