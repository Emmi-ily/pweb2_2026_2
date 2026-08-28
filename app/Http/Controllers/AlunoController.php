<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\CategoriaAluno;

class AlunoController extends Controller
{
    public function index()
    {
        $dados = Aluno::All();

        return view('aluno.list')->with(['dados' => $dados]);
    }

    function create()
    {
        $categorias = CategoriaAluno::orderBy('nome')->get();
        return view('aluno.form', compact('categorias'));
    }


    function validationForm(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'categoria_id' => 'required',
        ], [
            'nome.required' => "O :attribute é obrigatório",
            'cpf.required' => "O :attribute é obrigatório",
            'categoria_id.required' => "O :attribute é obrigatório",
        ]);
    }
    function store(Request $request)
    {
        $this->validationForm($request);
        Aluno::created($request->all());
        return redirect('aluno')->with("success", 'Registro salvo com sucesso');
    }


    function edit($id)
    {
        $data = Aluno::find($id);
        $categorias = CategoriaAluno::orderBy('nome')->get();
        return view('aluno.form', compact('data'), compact('categorias')); //compact passa a referencia da memoria daqui para a view
    }

    function update(Request $request, $id)
    {
        $this->validationForm($request);
        Aluno::find($id)->update($request->all());
        return redirect('aluno')->with("success", 'Registro atualizado com sucesso');
    }

    function destroy($id)
    {
        Aluno::destroy($id);
        return redirect('aluno')->with("success", 'Registro removido com sucesso!');
    }

    public function search (Request $request)
    {
        if(!empty($request->valor)) {
            $dados = Aluno::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        }else {
            $dados = Aluno::All();
        }
        return view('aluno.list', compact('dados'));
    }
}
