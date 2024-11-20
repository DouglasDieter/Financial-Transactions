<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Defina o nome da tabela explicitamente
    protected $table = 'cadastrotransacoes'; // Nome correto da tabela

    // Defina os campos que podem ser preenchidos
    protected $fillable = [
        'descricao',
        'tipo',
        'valor',
        'categoria',
        'data',
    ];

    // Desabilitar os campos timestamps
    public $timestamps = false;  // Porque vamos usar apenas o campo 'data' e não os campos padrão created_at/updated_at

    public function setValorAttribute($value)
{
    if ($this->attributes['tipo'] === 'despesa' && $value > 0) {
        // Transforma o valor em negativo apenas se for uma despesa
        $this->attributes['valor'] = -abs($value);
    } else {
        $this->attributes['valor'] = abs($value); // Garante que receitas sejam sempre positivas
    }
}

}
