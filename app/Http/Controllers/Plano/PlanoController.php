<?php

namespace App\Http\Controllers\Plano;

use App\Http\Controllers\Controller;
use App\Plano;
use Alert;
use PDF;
use SnappyPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanoController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Planos Controller
    |--------------------------------------------------------------------------
    |
    | Controlador que almacena las imagenes de los planos internos y externos. Y los muestran en pdf.
    |
    */

    /**
     * @var array $rules serie de reglas de validación para el
     * formulario para agregar un familiar.
     * @var array $message serie de mensajes personalizados para las validaciones
     * de formulario.
     */

    public $rulesInterno,$rulesExterno,$messages;

    /**
     * Constructor para asignar los valores a las variables y asignando rules y message de validación 
     * de formulario.
     *
     * @return void
     */
    public function __construct()
    {
        $this->rulesInterno = [
            'plano_interno_image'=>'required|string',
            'plano_interno'=>'required|string'
        ];
        $this->rulesExterno = [
            'plano_externo_image'=>'required|string',
            'plano_externo'=>'required|string'
        ];
        $this->messages = [
            'required'=>'El campo :attribute es requerido.',
            'string'=>'El campo :attribute debe ser texto',
        ];
    }

    /**
     * Store a new or update plano interno.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeInterno(Request $request)
    {
        // Validamos el formulario
        $request->validate($this->rulesInterno,$this->messages);
        //  Obtenemos el usuario.
        $user = Auth::user();
        // Actualizamos o creamos un nuevo registro de plano interno.
        $plano = Plano::updateOrCreate([
            'user_id' => $user->id
        ],[
            'plano_interno'=>$request->plano_interno
        ]);
        // Lanzamos una alerta al usuario de que la acción se realizo correctamente.
        Alert::success('Plano Interno','Registro guardado');
        // redirigimos al plan familiar.
        return redirect()->route('planfamiliar');

    }

    /**
     * Store a new or update plano interno.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeExterno(Request $request)
    {
        // Validamos el formulario
        $request->validate($this->rulesExterno,$this->messages);
        // Obtenemos el usuario.
        $user = Auth::user();
        // Actualizamos o creamos un nuevo registro de plano externo
        $plano = Plano::updateOrCreate([
            'user_id' => $user->id
        ],[
            'plano_externo'=>$request->plano_externo
        ]);
        // Lanzamos una alerta al usuario de que la accion se realizo correctamente.
        Alert::success('Plano Externo','Registro guardado');
        // Redirigimos al plan familiar.
        return redirect()->route('planfamiliar');
    }

    /**
     * Crea el recurso pdf DOMPDF (no en uso).
     *
     * @param  \App\Plano  $plano
     * @return \PDF $pdf
     */
    public function setDomPDF($tipo,$elemento=null)
    {
        // si elemento existe
        if($elemento){
            // Carga la vista con el registro
            $pdf =PDF::loadView('pdf.plano',['elemento'=>$elemento,'tipo'=>$tipo])->setPaper('a4','landscape');
        }
        else{
            // Carga el pdf cdel plano interno con una vista dummy
            $pdf = PDF::loadView('pdf.plano',['tipo'=>$tipo])->setPaper('a4','landscape');
        }
        return $pdf;
    }    



    /**
     * Display to PDF the specified resource empty usando DOMPDF (no en uso).
     *
     * @param  \App\Plano  $plano
     * @return \Illuminate\Http\Response
     */
    public function showInternoEmptyPDF()
    {
        // Carga el pdf del plano interno
        $pdf = $this->setDomPDF('interno');
        // Mostramos el pdf en el navegador.
        return $pdf->stream('plano interno.pdf');
    }

    /**
     * Display to PDF the specified resource usando DOMPDF (no en uso).
     *
     * @param  \App\Plano  $plano
     * @return \Illuminate\Http\Response
     */
    public function showInternoPDF()
    {
        //Obtenemos el usuario logeado
        $user = Auth::user();
        // Obtenemos el registro (imagen 64) del plano interno
        $plano_interno = $user->planos->plano_interno;
        // Cargamos el pdf del plano interno
        $pdf = $this->setDomPDF('interno',$plano_interno);
        // mostramos el pdf en el navegador
        return $pdf->stream('plano interno.pdf');
    }


    /**
     * Display to PDF the specified resource empty usando DomPDF.
     *
     * @param  \App\Plano  $plano
     * @return \Illuminate\Http\Response
     */
    public function showExternoEmptyPDF()
    {
        // Carga el pdf del plano interno con una vista dummy
        $pdf = $this->setDomPDF('externo');
        // Mostramos el pdf en el navegador.
        return $pdf->stream('plano externo.pdf');
    }

    /**
     * Display to PDF the specified resource usando DomPDF (no usado).
     *
     * @param  \App\Plano  $plano
     * @return \Illuminate\Http\Response
     */
    public function showExternoPDF()
    {
        // Obtenemos el usuario logeado
        $user = Auth::user();
        // obtenemos el registro de plano externo.
        $plano_externo = $user->planos->plano_externo;
        // carga la vista pdf del plano externo
        $pdf = $this->setDomPDF('externo');
        // Mostramos el pdf en el navegador
        return $pdf->stream('plano externo.pdf');
    }



    /**
     * Display to PDF the specified resource empty usando DomPDF (no usado).
     *
     * @param  \App\Plano  $plano
     * @return \Illuminate\Http\Response
     */
    public function downloadInternoEmptyPDF()
    {
        // Cargamos la vista con un plano dummy
        $pdf = $pdf = $this->setDomPDF('interno');
        // Descargamos el archivo pdf
        return $pdf->download('plano interno.pdf');
    }

    /**
     * Display to PDF the specified resource usando DomPDF (no usado).
     *
     * @param  \App\Plano  $plano
     * @return \Illuminate\Http\Response
     */
    public function downloadInternoPDF()
    {
        // Obtenemos el usuario logeado
        $user = Auth::user();
        // Obtenemos la imagen/registro del plano interno
        $plano_interno = $user->planos->plano_interno;
        // Cargamos la vista con el plano guardado.
        $pdf = $this->setDomPDF('interno',$plano_interno);
        // Descargamos el archivo pdf
        return $pdf->download('plano interno.pdf');
    }


    /**
     * Display to PDF the specified resource empty usando DomPDF (no usado).
     *
     * @param  \App\Plano  $plano
     * @return \Illuminate\Http\Response
     */
    public function downloadExternoEmptyPDF()
    {
        // Cargamos la vista con un plano dummy
        $pdf = $this->setDomPDF('externo');
        // Descargamos el archivo pdf
        return $pdf->download('plano externo.pdf');
    }

    /**
     * Display to PDF the specified resource usando DomPDF (no usado).
     *
     * @param  \App\Plano  $plano
     * @return \Illuminate\Http\Response
     */
    public function downloadExternoPDF()
    {
        // Obtenemos el usuario logeado
        $user = Auth::user();
        // Obtenemos el registro/imagen del plano externo
        $plano_externo = $user->planos->plano_externo;
        // Cargamos la vista con el plano guardado.
        $pdf = $this->setDomPDF('externo',$plano_externo);
        // Descargamos el archivo pdf
        return $pdf->download('plano externo.pdf');
    }

    /**
     * Crea el recurso pdf con SnappyPDF y wkhtmltopdf-amd64 (En uso).
     *
     * @param  \App\Plano  $plano
     * @return \SnappyPdf $pdf
     */
    public function setSnappyPDF($tipo,$elemento=null)
    {
        // si elemento existe
        if($elemento){
            // Carga la vista con el registro
            $pdf = SnappyPDF::loadView('pdf.plano_snappy',['elemento'=>$elemento,'tipo'=>$tipo])->setPaper('a4')->setOrientation('landscape');
        }
        else{
            // Carga el pdf cdel plano interno con una vista dummy
            $pdf = SnappyPDF::loadView('pdf.plano_snappy',['tipo'=>$tipo])->setPaper('a4')->setOrientation('landscape');
        }
        return $pdf;
    }    

    // SNAPPY
    /**
     * Display to PDF the specified resource empty usando Snappy (usado actualmente).
     *
     * @param  \App\Plano  $plano
     * @return \Illuminate\Http\Response
     */
    public function showSnappyInternoEmptyPDF()
    {
        // Cargamos la vista con un plano dummy
        $pdf = $this->setSnappyPDF('Interno');
        // Mostramos el archivo pdf en el navegador
        return $pdf->stream('plano interno.pdf');
    }

    /**
     * Display to PDF the specified resource usando Snappy (usando actualmente).
     *
     * @param  \App\Plano  $plano
     * @return \Illuminate\Http\Response
     */
    public function showSnappyInternoPDF()
    {
        //Obtenemos el usuario logeado
        $user = Auth::user();
        // Obtenemos el registro/imagen del plano interno
        $plano_interno = $user->planos->plano_interno;
        // Cargamos la vista con un plano
        $pdf = $this->setSnappyPDF('Interno',$plano_interno);
        // Mostramos el archivo pdf en el navegador
        return $pdf->stream('plano interno.pdf');
    }


    /**
     * Display to PDF the specified resource empty usando Snappy (no usado actualmente).
     *
     * @param  \App\Plano  $plano
     * @return \Illuminate\Http\Response
     */
    public function showSnappyExternoEmptyPDF()
    {
        // Cargamos la vista con un plano dummy
        $pdf = $this->setSnappyPDF('Externo');
        // Mostramos el archivo pdf en el navegador
        return $pdf->stream('plano externo.pdf');
    }

    /**
     * Display to PDF the specified resource usando Snappy (usado actualmente).
     *
     * @param  \App\Plano  $plano
     * @return \Illuminate\Http\Response
     */
    public function showSnappyExternoPDF()
    {
        // Obtenemos el usuario logeado.
        $user = Auth::user();
        // Obtenemos el registro/imagen del plano externo.
        $plano_externo = $user->planos->plano_externo;
        // Cargamos la vista con un plano
        $pdf = $this->setSnappyPDF('Externo',$plano_externo);
        // Mostramos el archivo pdf en el navegador.
        return $pdf->stream('plano externo.pdf');
    }



    /**
     * Download to PDF the specified resource empty usando Snappy (no usado actualmente).
     *
     * @param  \App\Plano  $plano
     * @return \Illuminate\Http\Response
     */
    public function downloadSnappyInternoEmptyPDF()
    {
        // Cargamos la vista con el plano dummy si no existe registro
        $pdf = $this->setSnappyPDF('Interno');
        // Descargamos el archivo pdf.
        return $pdf->download('plano interno.pdf');
    }

    /**
     * Download to PDF the specified resource usando Snappy (no usado actualmente).
     *
     * @param  \App\Plano  $plano
     * @return \Illuminate\Http\Response
     */
    public function downloadSnappyInternoPDF()
    {
        // obtenemos el usuario logeado.
        $user = Auth::user();
        // obtenemos el registro/imagen del plano interno.
        $plano_interno = $user->planos->plano_interno;
        // Cargamos la vista con el plano guardado
        $pdf = $this->setSnappyPDF('Interno',$plano_interno);
        // Descargamos el archivo pdf
        return $pdf->download('plano interno.pdf');
    }


    /**
     * Download to PDF the specified resource empty usando Snappy (no usado actualmente).
     *
     * @param  \App\Plano  $plano
     * @return \Illuminate\Http\Response
     */
    public function downloadSnappyExternoEmptyPDF()
    {
        //Cargamos la vista con el plano dummy.
        $pdf = $this->setSnappyPDF('Externo');
        // Descargamos el archivo pdf.
        return $pdf->download('plano externo.pdf');
    }

    /**
     * Display to PDF the specified resource usando Snappy (no usado actualmente).
     *
     * @param  \App\Plano  $plano
     * @return \Illuminate\Http\Response
     */
    public function downloadSnappyExternoPDF()
    {
        // Obtenemos el usuario logeado.
        $user = Auth::user();
        // Obtenemos el plano externo si existe
        $plano_externo = $user->planos->plano_externo;
        //Cargamos la vista con el plano.
        $pdf = $this->setSnappyPDF('Externo',$plano_externo);
        // Descargamos el archivo pdf
        return $pdf->download('plano externo.pdf');
    }
}
