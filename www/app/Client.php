<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Address;

class Client extends Model
{
    protected $fillable = [
        'company_name', 'cnpj', 'name_responsible', 'email', 'phone'
    ];
    
    /**
     * @params
     * @return relationship
     * Nesse caso, a função retorna o relacionamento entre o endereço e o cliente.
     */
    public function address(){
        return $this->hasMany('App\Address', 'id', 'id_client');
    }

    /**
     * @params
     * @return creation
     * Nesse caso, a função retorna o status do endereço criado
     */
    public function createAddress (Address $address) {
        return $this->address()->save($address);
    }
}
