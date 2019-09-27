<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursales extends Model
{
    protected $table = 'sucursales';

    protected function Guardar($request,$BD)
    {

;
        if ( is_null($request->id_sucursal) ){      
            $sucursal = new Sucursales;
            $sucursal->setConnection($BD);
        }else{
            $sucursal = \App\Sucursales::on($BD)->find($request->id_sucursal);    
        }

		$sucursal->nombreEmpresa = $request->nombre_clinica;
		$sucursal->nombre = $request->sucursal_config;
		$sucursal->nroFiscal = $request->nroDocFiscal;
		$sucursal->nombreCortoSucursal = $request->nombre_corto_config;
		$sucursal->direccion = $request->direccion;
		$sucursal->telPrincipal = $request->fono1_config;
		$sucursal->telSecundario = $request->fono2_config;
		$sucursal->email = $request->email;
		$sucursal->web = $request->pagina_web_config;
		$sucursal->sillones = $request->sillones;
		
        return $sucursal->save();
    }
}
