<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Requests\EmpresaFormRequest;

class EmpresaController extends Controller
{
    public function create(){
        return view('empresa.create');
    }

    public function store(EmpresaFormRequest $request){
        $data = $request->validated();

        $empresa = Empresa::create($data);       

        return redirect('/add-empresa')->with('message', 'Empresa adicionada');
    }
}
