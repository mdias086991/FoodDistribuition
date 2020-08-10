<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'cep', 'patio', 'neighborhood', 'complemento', 'number', 'city', 'statue', 'status', 'id_client'
    ];

    /**
     * @param
     * @return relationship
     * função retorna o relacionamento entre o cliente e o endereço. 
     * Nesse caso, o endereço pertence a um cliente
     */

    public function client () {
        return $this->belongsTo('App\Client', 'id', 'id_client');
    }

}
