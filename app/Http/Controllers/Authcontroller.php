<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Authcontroller extends Controller
{
    Public function me(){
    return [
        'NIS' => 3103120143,
        'Name' => 'Muhammad Bintang',
        'Phone' => '085329966272',
        'Class' => 'XII RPL 5',
    ];
}
}
