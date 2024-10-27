<?php

namespace App\Http\Controllers;

use App\Repositories\DashboardRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    protected $repository;
    public $dashboardRepository;

    public function __construct(DashboardRepository $dashboardRepository)
    {
        $this->repository = $dashboardRepository;
    }


    public function getUser()
    {
        try {

            $users = $this->repository->getUser();

            return view('dashboard', compact('users'));

        } catch (\Throwable $th) {

            Log::error("getUser Exception error : " . $th->getMessage() . $th->getLine() . $th->getFile());

            return view('welcome');

        }
    }
    
    public function getFilterData(Request $req)
    {
        try {
            $data = $req->all();

            $data = $this->repository->getFilterData($data);

            $is_filter = true;

            $users = $data['users'] ?? [];
            $user = $data['user'] ?? [];

            return view('dashboard', compact('users','user','is_filter'));

        } catch (\Throwable $th) {

            Log::error("getFilterData Exception error : " . $th->getMessage() . $th->getLine() . $th->getFile());

            return view('welcome');

        }
    }

    public function dataSorting(Request $req)
    {
        try {
            $data = $req->all();

            $data = $this->repository->dataSorting($data);

            $users = $data['users'] ?? [];
            $message = $data['message'] ?? '';

            return view('dashboard', compact('users','message'));

        } catch (\Throwable $th) {

            Log::error("dataSorting Exception error : " . $th->getMessage() . $th->getLine() . $th->getFile());

            return view('welcome');

        }
    }
}
