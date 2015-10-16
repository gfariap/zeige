<?php

namespace Zeige;

use Illuminate\Database\Eloquent\SoftDeletes;

class Marcador extends \Eloquent
{

    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'marcadores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'x', 'y', 'titulo', 'descricao', 'tela_id' ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [ 'deleted_at' ];


    /**
     * Pertence a uma tela.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tela()
    {
        return $this->belongsTo(Tela::class, 'tela_id');
    }
}
