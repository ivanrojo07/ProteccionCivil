<?php

namespace App\Http\Controllers\Familia;

use App\Familia;
use App\Http\Controllers\Controller;
use App\TipoParentesco;
use App\TipoSangre;
use App\TipoSeguro;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\Snappy\Facades\SnappyPdf as SnappyPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Alert;

class FamiliaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Familia Controller
    |--------------------------------------------------------------------------
    |
    | Controlador que muestra formularios para agregar o modificar el registro
    | de un familiar.
    |
    */
    
    /**
     * @var array(App\TipoParentesco) $parentesco obtiene los tipos de 
     * parentesco de la base de datos.
     * @var array(App\TipoSangre) $tipo_sangre obtiene los diferentes tipos
     * de sangre de la base de datos.
     * @var array $generos obtiene el genero masculino o femenino
     * @var array(App\TipoSeguro) $tipo_seguro obtiene los diferentes tipos de 
     * de seguro.
     * @var array $rules serie de reglas de validación para el
     * formulario para agregar un familiar.
     * @var array $message serie de mensajes personalizados para las validaciones
     * de formulario.
     */
    public $parentesco,$tipo_sangre,$generos,$tipos_seguros,$rules,$messages;

    /**
     * Agregando valores a las variables y asignando rules y message de validación 
     * de formulario.
     *
     * @return void
     */
    public function __construct()
    {
        $this->tipo_seguros = TipoSeguro::orderBy('id','asc')->get();
        $this->parentesco = TipoParentesco::orderBy('id','asc')->get();
        $this->tipo_sangre= TipoSangre::orderBy('id','asc')->get();
        $this->generos=[
            'Masculino',
            'Femenino'
        ];
        $this->rules = [
            'imagen'=>'nullable|string',
            'nombre'=>'required|string|regex:/^[\pL\s\-]+$/u',
            'apellido_p'=>'nullable|string|regex:/^[\pL\s\-]+$/u',
            'apellido_m'=>'nullable|string|regex:/^[\pL\s\-]+$/u',
            'edad'=>'required|date|before:'.date('Y-m-d'),
            'alergias'=>'nullable|string|max:50',
            'enfermedades'=>'nullable|string|max:50',
            'tipo_sanguineo'=>'nullable|string|exists:tipo_sangres,name',
            'genero'=>'nullable|string|in:Masculino,Femenino',
            'numero_seguro'=>'nullable|string|max:25',
            'tipo_seguro'=>'nullable|string|exists:tipo_seguros,nombre',
            'nombre_emergencia'=>'nullable|string|max:50',
            'parentesco'=>'nullable|string|exists:tipo_parentescos,name',
            'telefono'=>'nullable|numeric|min:1|max:9999999999',
            'discapacidad'=>'nullable|boolean',
            'cual'=>'nullable|string|max:50'
        ];
        $this->messages=[
            'required'=>'El campo :attribute es requerido.',
            'string'=>'El campo :attribute debe ser texto',
            'max'=>'El campo :attribute debe ser maximo de :max caracteres',
            'numeric'=>'El campo :attribute debe ser númerico',
            'alpha_num'=>'El campo :attribute debe ser alfanuméricos',
            'in'=> 'El campo :attribute debe tener alguno de estos valores: :values',
            'exists'=>'Valor no valido',
            'between'=> 'El campo :attribute debe estar entre el valor :min y el valor :max',
            'before'=>'Tu edad debe ser menor a :date'
        ];
        
    }

    /**
     * Muestra el formulario para crear un nuevo familiar.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Obteniendo el usuario logeado
        $user = Auth::user();
        // Obtener el dato general del usuario
        $dato_general = $user->dato_general;
        // Mostrar el formulario para crear un nuevo familiar
        // Con la bandera create para mandar la acción a la ruta guardar.
        return view('familia.form',['dato_general'=>$dato_general,'tipo_seguros'=>$this->tipo_seguros,'parentesco'=>$this->parentesco,'tipo_sangre'=>$this->tipo_sangre,'generos'=>$this->generos,'create'=>true]);
    }

    /**
     * Crear un nuevo familiar y agregarlo al usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Obteniendo el usuario logeado.
        $user = Auth::user();
        // Validar el formulario
        $request->validate($this->rules,$this->messages);
        // crear el modelo familia con los datos del formulario.
        $familia = new Familia([
                'nombre'=>$request->nombre,
                'apellido_p'=>$request->apellido_p,
                'apellido_m'=>$request->apellido_m,
                'f_nac'=>$request->edad,
                'alergias'=>$request->alergias,
                'enfermedades'=>$request->enfermedades,
                'tipo_sanguineo'=>$request->tipo_sanguineo,
                'genero'=>$request->genero,
                'nombre_emergencia'=>$request->nombre_emergencia,
                'parentesco_emergencia'=>$request->parentesco,
                'telefono_emergencia'=>$request->telefono,
                'numero_seguro'=>$request->numero_seguro,
                'tipo_seguro'=>$request->tipo_seguro,
                'discapacidad'=>$request->discapacidad,
                'tipo_discapacidad'=>$request->cual,
                'foto_perfil'=>$request->imagen
            ]);
        // Guarda el modelo en la relación con el usuario.
        $user->familiares()->save($familia);
        // Si este familiar sera el responsable del plan
        if($request->responsable == "on"){
            // Recorrer la lista de familiares creados.
            foreach ($user->familiares as $fam) {
                // Si el familiar del arreglo es el mismo que se agrego
                if($fam->id == $familia->id){
                    // se asigna como responsable
                    $fam->responsable = 1;
                    // Y se guarda.
                    $fam->save();
                }
                // De lo contrario
                else{
                    // A los demas se cambia el estatus a no responsable
                    $fam->responsable = 0;
                    // Y se guarda.
                    $fam->save();
                }
            }
        }
        // Se lanza una alerta al usuario de que el registro se llevo a cabo.
        Alert::success('Familiar Agregado','El registro ha sido creado y ahora estan conectado con Protección Civil');
        // Y se redirige al dashboard del usuario.
        return redirect()->route('dashboard');

    }

    /**
     * Muestra el formulario para editar un nuevo familiar.
     *
     * @param  App\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function edit(Familia $familia)
    {
        // Obtenemos el usuario logeado
        $user = Auth::user();
        // Obtenemos el dato general del usuario
        $dato_general = $user->dato_general;
        // verificamos si el familiar a editar tiene una relación con el usuario logeado.
        if($user->id == $familia->user_id){
            // Mostrar el formulario para editar un nuevo familiar
            // Con la bandera create en falso para mandar la acción a la ruta actualizar.
            return view('familia.form',['familia'=>$familia,'dato_general'=>$dato_general,'tipo_seguros'=>$this->tipo_seguros,'parentesco'=>$this->parentesco,'tipo_sangre'=>$this->tipo_sangre,'generos'=>$this->generos,'create'=>false]);
        }
        else{
            // Si el familiar a editar no tiene relacion con el usuario logeado redirigimos al dashboard
            return redirect()->route('dashboard');
        }
    }

    /**
     * Actualizar los datos de ese familiar.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Familia $familia)
    {
        //Obtenemos el usuario logeado
        $user = Auth::user();
        // Validar el formulario
        $request->validate($this->rules,$this->messages);
        // Verificar si el familiar a editar tiene una relación con el usuario logeado.
        if($user->id == $familia->user_id){
            // actualizamos el familiar con el nuevo registro
            $familia->update([
                'nombre'=>$request->nombre,
                'apellido_p'=>$request->apellido_p,
                'apellido_m'=>$request->apellido_m,
                'f_nac'=>$request->edad,
                'alergias'=>$request->alergias,
                'enfermedades'=>$request->enfermedades,
                'tipo_sanguineo'=>$request->tipo_sanguineo,
                'genero'=>$request->genero,
                'nombre_emergencia'=>$request->nombre_emergencia,
                'parentesco_emergencia'=>$request->parentesco,
                'telefono_emergencia'=>$request->telefono,
                'numero_seguro'=>$request->numero_seguro,
                'tipo_seguro'=>$request->tipo_seguro,
                'discapacidad'=>$request->discapacidad,
                'tipo_discapacidad'=>$request->cual,
                'foto_perfil'=>$request->imagen
            ]);
            // Si la actualización hace responsable al familiar.
            if($request->responsable == "on"){
                // Recorrer la lista de familiares
                foreach ($user->familiares as $fam) {
                    // si es el familiar actualizado
                    if($fam->id == $familia->id){
                        // hacemos a ese familiar el responsable del plan
                        $fam->responsable = 1;
                        // Y guardamos.
                        $fam->save();
                    }
                    // de lo contrario
                    else{
                        // los demas familiares los dejamos como no responsables
                        $fam->responsable = 0;
                        // Y guardamos.
                        $fam->save();
                    }
                }
            }
        }
        // y lanzamos una alerta al usuario notificando que la acción se realizo correctamente.
        Alert::success('Familiar Actualizado','El registro ha sido actualizado con Protección Civil');
        // Y redirigimos al dashboard
        return redirect()->route('dashboard');
    }

    /**
     * Eliminar un registro familiar.
     *
     * @param  App\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Familia $familia)
    {
        // Obtenemos el usuario logeado
        $user = Auth::user();
        // Si el familiar a eliminar tiene una relación con el usuario logeado.
        if($familia->user_id == $user->id){
            // Realizamos la acción delete al modelo
            $familia->delete();
            // Lanzamos una alerta al usuario notificando que la acción se realizo correctamente
            Alert::success('Familiar eliminado','El registro se elimino correctamente');
            // Y redirigimos als dashboard
            return redirect()->route('dashboard');

        }
        // si no tiene relación con el usuario
        else{
            // Lanzamos una alerta de error al usuario notificando que la acción no se puede realizar
            Alert::error('No puedes eliminar este registro');
            // Y redirigimos al dashboard.
            return redirect()->route('dashboard');
        }
            
    }



    /**
     * Muestra las tarjetas de seguridad para el usuario con los datos de los familiares
     * usando la libreria DOMPDF (No utilizado hasta ahora).
     *
     * @return \Illuminate\Http\Response
     */
    public function showPDF()
    {
        // obtenemos el usuario logeado
        $user = Auth::user();
        // Obtenemos los familiares del usuario
        $familias = $user->familiares;
        // Creamos el pdf con la vista predefinida e inyectando los datos.
        $pdf = PDF::loadView('pdf.familiares',['familiares'=>$familias]);
        // Retornamos el pdf en el navegador.
        return $pdf->stream();
    }

    /**
     * Muestra las tarjetas de seguridad para el usuario con los datos de los familiares
     * usando la libreria Snappy con el plugin wkhtmltopdf-amd64 (Utilizado actualmente).
     *
     * @return \Illuminate\Http\Response
     */
    public function showSnappyPDF(){
        // Obtenemos el usuario autenticado.
        $user = Auth::user();
        // Obtenemos los familiares del usuario.
        $familias = $user->familiares;
        // Creamos el pdf con la vista predefinida e inyectamos los datos
        $pdf_snappy = SnappyPdf::loadView('pdf.familiares_snappy',['familiares'=>$familias]);
        // Retornamos el pdf en el navegador.
        return $pdf_snappy->stream('tarjeta seguridad.pdf');

    }

    /**
     * Muestra el pdf con la plantilla vacia de las tarjetas de seguridad con 4 tarjetas.
     *
     * @return \Illuminate\Http\Response
     */
    public function showEmptySnappyPDF(){
        // Crea el pdf con vista predefinida y con 4 tarjetas
        $pdf_snappy = SnappyPdf::loadView('pdf.familiares_snappy');
        // Retornamos el pdf en el navegador.
        return $pdf_snappy->stream('tarjeta seguridad.pdf');

    }

    /**
     * Descarga el pdf con las tarjetas de seguridad de los familiares del usuario
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadSnappyPDF()
    {
        // Usuario autenticado
        $user = Auth::user();
        // obtenemos los familiares del usuario
        $familias = $user->familiares;
        // cargamos la vista con los familiares
        $pdf_snappy = SnappyPdf::loadView('pdf.familiares_snappy',['familiares'=>$familias]);
        // Retornamos el documento para su descarga.
        return $pdf_snappy->download('tarjeta seguridad.pdf');
    }
}
