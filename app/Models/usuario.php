<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    use HasFactory;
    //use Notifiable;
    protected $table = "usuario";
    protected $primaryKey="id";
    protected $fillable=array("nombre_usuario","email_usuario","password_usuario","ultima_sesion","rol_id","estado_usuario");
    
    public function rol()
    {
        return $this->belongsTo('App\Models\rol');
    }

}
