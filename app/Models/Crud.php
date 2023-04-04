<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Crud extends Model
{
    use HasFactory;
    protected $fillable=['name','color','email','image'];
    protected $table = "cruds";


    public function deleteIamges(){

        return Storage::disk('public')->delete($this->image);

}
}
