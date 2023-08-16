<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FamilyMove;

class FamilyMoveController extends Controller
{
    //
    private $familyMove;

    public function __construct(FamilyMove $familyMove)
    {
        $this->familyMove = $familyMove;
        view()->share([

        ]);
    }
}
