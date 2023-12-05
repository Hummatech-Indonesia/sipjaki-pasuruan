<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\FundSourceInterface;
use App\Http\Requests\FundSourceRequest;
use App\Traits\PaginationTrait;
use Illuminate\Http\Request;

class sourceFundController extends Controller
{

    public function index(Request $request)
    {
        return view('pages.source-fund');
    }

    public function create()
    {
        //
    }

    public function store(FundSourceRequest $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        
    }

    public function destroy(string $id)
    {
        //
    }
}
