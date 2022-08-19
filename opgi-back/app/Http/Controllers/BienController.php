<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use Illuminate\Http\Request;
use App\Http\Resources\BienResource;
use App\Http\Resources\LocataireResource;
use App\Http\Resources\QloyeResource;
use App\Http\Resources\BienCollection;
use App\Http\Resources\LocataireCollection;
use App\Http\Resources\QloyeCollection;
use Illuminate\Support\Facades\DB;

class BienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new BienCollection(Bien::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bien  $bien
     * @return \Illuminate\Http\Response
     */
    public function show($bien)
    {
        $comp =  DB::table('bien')
                    ->select('bien.idbien', 'bien.COM', 'commune.LIBELLECOM' , 'bien.CITE', 'cite.LIBELLECITE' 
                    , DB::raw("concat_ws('', bien.NORDR) AS NORDR"), 'bien.NATURE',
                     'bien.BAT', 'bien.CAGE' , 'bien.ETAGE' , 'bien.PORTE' , 'bien.TYPOLOGIE',
                     'contrats.idcontrat','contrats.LP','contrats.CL','contrats.abatement')
                   ->join('commune', 'commune.COM', '=', 'bien.COM')
                   ->join('cite', 'cite.CITE', '=', 'bien.CITE')
                   ->join('contrats', 'contrats.idcontrat', '=', 'bien.IDCONTRAT_ACTUEL')
                    ->where(DB::raw("concat_ws('',bien.COM , bien.CITE , NATURE, NORDR)") , $bien)
                   ->get();
        if(count($comp) > 0){
            return new BienResource($comp[0]);
        }else{
            return ["error"=>"error"];
        }        
    }

    public function showLocataire($id)
    {  
        $res =  DB::table('locataires')
                ->select('NOM', 'PRENOM', 'DATNAIS' , 'LIEU')
                ->join('contrat_locataire', 'contrat_locataire.id_locataire', '=', 'locataires.id_locataire')
                ->where( 'contrat_locataire.IDcontrat', $id)
                ->get();
        return   new LocataireCollection($res);      
    }

    public function showQloye($id)
    {  
        $arr =DB::table('lignes_ployer')
                ->select('idqloyer')
                ->where( 'lignes_ployer.IDBIEN', $id)->get()
                ->toArray();
        $arrValues = array();
        foreach($arr as $obj) {
            $arrValues[]= $obj->idqloyer;
        }
       
        $res =  DB::table('qloye')
                ->select('ECH', 'LP', 'CL' , 'MTABAT')
                ->where( 'qloye.IDBIEN', $id)
                ->whereNotIn('qloye.IDQLOYE' , $arrValues)
                ->get();
      
        return  new QloyeCollection($res);      
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bien  $bien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bien $bien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bien  $bien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bien $bien)
    {
        //
    }
}
