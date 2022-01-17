<?php

namespace App\Http\Controllers;

use App\Repositories\MaxSumRepository;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected $request;
    protected $maxSumRepo;

    public function __construct(MaxSumRepository $maxSumRepo)
    {
        $this->maxSumRepo = $maxSumRepo;

    }

    public function maxsum(Request $request)
    {
        try {

            return  $this->maxSumRepo->maxSumArray($request->all());

        }catch (\Exception $e){
            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }
}
