<?php

namespace App\Http\Controllers;
use PHPJasper\PHPJasper;

use Illuminate\Http\Request;

class RelatorioControlle extends Controller
{
    public function getId(){
        return view('relatorio');
    }

    public function compilar() {
        $input = base_path() .
        '/vendor/geekcom/phpjasper/examples/cabecalho.jrxml';
        $jasper = new PHPJasper;
        $jasper->compile($input)->execute();
        
        return view('index');
        // return response()->json([
        //     'status' => 'ok',
        //     'msg' => 'Reporte compilado!'
        // ]);
    }

    public function gerar(Request $request) {
        $getId = $request->input('get-id');
        $input = base_path() .
        '/vendor/geekcom/phpjasper/examples/cabecalho.jasper';
        $output = base_path() .
        '/vendor/geekcom/phpjasper/examples';
        $options = [
            'format' => ['pdf'],
            'locale' => 'en',
            'params' => [
                'ID' => $getId,
            ],
            'db_connection' => [
                'driver' => 'postgres',
                'username' => env('DB_USERNAME'),
                'password' => env('DB_PASSWORD'),
                'host' => env('DB_HOST'),
                'database' => env('DB_DATABASE'),
                'port' => env('DB_PORT'),
                // 'schema' => env('DB_SCHEMA')
            ]
        ];

        $jasper = new PHPJasper;
        // $output = $jasper->listParameters($input)->execute();
        // dd($output);
         $jasper->process(
            $input,
            $output,
            $options,
            // $this->getDatabase()
        )->execute();
        
    
        $pathToFile = base_path() .
        '/vendor/geekcom/phpjasper/examples/cabecalho.pdf';
        return response()->file($pathToFile);
    }
}

