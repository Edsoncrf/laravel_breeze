<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Requests\EmpresaFormRequest;
use Illuminate\Http\Response;

class EmpresaController extends Controller
{
    public function index(){
        $empresas = Empresa::all();
        return view('empresa.index', compact('empresas'));
    }

    public function create(){
        return view('empresa.create');
    }

    public function store(EmpresaFormRequest $request){
        $data = $request->validated();

        $data['cnpj'] = preg_replace('/[^0-9]/', '', $data['cnpj']);

        $empresa = Empresa::create($data);       

        return redirect('/add-empresa')->with('message', 'Empresa adicionada');
    }

    public function edit($empresa_id){
        $empresa = Empresa::find($empresa_id);  
        return view('empresa.edit', compact('empresa'));
    }

    public function update(EmpresaFormRequest $request, $empresa_id){
        
        $data = $request->validated();

        $empresa = Empresa::where('id', $empresa_id)->update([
            'nome' => $data['nome'],
            'email' => $data['email'],
            'telefone' => $data['telefone'],
            'cnpj' => preg_replace('/[^0-9]/', '', $data['cnpj']),
        ]);       

        return redirect('/empresas')->with('message', 'Empresa Alterada');
    }

    public function destroy($empresa_id){
        $empresa = Empresa::find($empresa_id)->delete();  
        return redirect('/empresas')->with('message', 'Empresa Deletada');
    }

    public function show($cnpj)
    {
       
        // $empresa = Empresa::where('cnpj', $cnpj)->first();
        $empresa = Empresa::select('nome', 'email', 'telefone', 'cnpj')
                            ->where('cnpj', $cnpj)
                            ->first();

        if ($empresa) {
            return response()->json($empresa);
        } else {
            return response()->json(['message' => 'Empresa não encontrada'], Response::HTTP_NOT_FOUND);
        }
    }

}
