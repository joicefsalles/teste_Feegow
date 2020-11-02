<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Solicitar extends Model
{

    protected $table = "feegow_solicitacoes";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'CPF',
        'nascimento',
        'id_profissinal',
        'id_especialidade',
        'id_origem'

    ];


    protected $casts = [
        'nascimento' => 'date:d/m/Y ',
        'created_at' => 'date:d/m/Y H:i:s',
        'updated_at' => 'date:d/m/Y H:i:s'
    ];

    public function insertsolicitar($dados)
    {

        $dados['nascimento']  = Carbon::createFromFormat('d/m/Y', $dados['nascimento'])->format('Y-m-d');
        $dados['CPF'] = str_replace(array(".", ",", "-", "/"), "", trim($dados['CPF']));

        $retorno = $this::updateOrCreate(
            [
                'CPF' => $dados['CPF'],
                'nome' => $dados['nome'],
                'nascimento' => $dados['nascimento'],
                'id_origem' => $dados['id_origem'],
                'id_profissinal' => $dados['id_profissinal'],
                'id_especialidade' => $dados['id_especialidade'],
            ],
            [
                'CPF' => $dados['CPF'],
                'id_profissinal' => $dados['id_profissinal'],
            ]
        );
        return $retorno;
    }
}
