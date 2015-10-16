<?php

namespace Zeige;

use Illuminate\Database\Eloquent\SoftDeletes;

class Tela extends \Eloquent
{

    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'telas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'titulo', 'imagem', 'apresentacao_id' ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [ 'deleted_at' ];


    /**
     * Pertence a uma apresentação.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function apresentacao()
    {
        return $this->belongsTo(Apresentacao::class, 'apresentacao_id');
    }


    /**
     * Possui vários marcadores.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function marcadores()
    {
        return $this->hasMany(Marcador::class, 'tela_id');
    }
}
