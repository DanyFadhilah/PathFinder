<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $table = 'applicant';
    protected $fillable = ['nama', 'email', 'gender', 'usia', 'pekerjaan1', 'tempatkerja1', 'lamakerja1', 
    'pekerjaan2', 'tempatkerja2', 'lamakerja2', 'pendidikan', 'fakultas', 'ipk', 'alamat', 'mingaji', 'maxgaji'];
}
