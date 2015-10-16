<?php

namespace Zeige;

use Illuminate\Database\Eloquent\SoftDeletes;

class Projeto extends \Eloquent
{

    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projetos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'nome', 'cliente', 'status', 'codigo', 'email', 'descricao', 'imagem' ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [ 'deleted_at' ];


    /**
     * Filtra apenas os projetos ativos do sistema.
     *
     * @param $query
     *
     * @return mixed
     */
    public function scopeAtivos($query)
    {
        return $query->where('status', '=', 1);
    }


    /**
     * Filtra apenas os projetos inativos do sistema.
     *
     * @param $query
     *
     * @return mixed
     */
    public function scopeInativos($query)
    {
        return $query->where('status', '=', 2);
    }


    /**
     * Possui várias apresentações.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function apresentacoes()
    {
        return $this->hasMany(Apresentacao::class, 'projeto_id');
    }
}
