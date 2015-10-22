<?php

namespace Zeige;

use Illuminate\Database\Eloquent\SoftDeletes;

class Apresentacao extends \Eloquent
{

    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'apresentacoes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'versao', 'dispositivo', 'projeto_id' ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [ 'deleted_at' ];


    /**
     * Pertence a um projeto.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function projeto()
    {
        return $this->belongsTo(Projeto::class, 'projeto_id');
    }


    /**
     * Possui várias telas.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function telas()
    {
        return $this->hasMany(Tela::class, 'apresentacao_id');
    }


    /**
     * Exibir dispositivo com primeira letra maiúscula.
     *
     * @return string
     */
    public function getDispositivoAttribute() {
        return ucfirst($this->attributes['dispositivo']);
    }

}
