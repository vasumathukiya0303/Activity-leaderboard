<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Activity;
use App\Repositories\Dashboardinterface;
use Illuminate\Support\Facades\DB;

class DashboardRepository implements Dashboardinterface{

    public $user;
    public $activity;

    public function __construct(User $user,Activity $activity)
    {
        $this->user = $user;
        $this->activity = $activity;
    }

    public function getUser(){

        $users = $this->user->with('activities')->get();

        if(empty($users)){
            return [];
        }

        /** count the total point of activities **/
        foreach ($users as $user) {
            $totalPoints = $user->activities->sum('point');
            $user->total_point = $totalPoints;
            $user->save();
        }

        /** Need to decide and update the rank based on total_point **/
        $rankedUsers = $this->user->orderBy('total_point', 'desc')->get();

        foreach ($rankedUsers as $index => $user) {
            $user->rank = $index + 1;
            $user->save();
        }

        $showUsers = $this->user->orderBy('rank', 'asc')->get();

        return $showUsers;

    }

    public function getFilterData($data){

        $response = [];

        if(empty($data['user_id'])){
            return [
                'status' => 400,
                'data'   => 'error',
                'message' => 'User Id not found.'
            ];
        }
        $response['users'] = $this->user->orderBy('rank', 'asc')->get();
        $response['user'] = $this->user->findOrFail($data['user_id']);

        return $response;
    }

    public function dataSorting($data){

        $response = [];

        if(empty($data['sorting_by'])){
            return [
                'status' => 400,
                'data'   => 'error',
                'message' => 'Sorting by not found.'
            ];
        }
        $msg = '';

        switch($data['sorting_by']) {
        /*** Day vise case ***/
            case('d'):

                $users = DB::table('users')
                    ->leftJoin('activities', 'users.id', '=', 'activities.user_id')
                    ->select('users.*', DB::raw('SUM(activities.point) as total_points'))
                    ->whereMonth('activities.time', '=', date('d'))
                    ->groupBy('users.id')
                    ->orderBy('users.rank', 'asc')
                    ->get();

                break;
        /*** Month vise case ***/
            case('m'):

                $users = DB::table('users')
                    ->leftJoin('activities', 'users.id', '=', 'activities.user_id')
                    ->select('users.*', DB::raw('SUM(activities.point) as total_points'))
                    ->whereMonth('activities.time', '=', date('m'))
                    ->groupBy('users.id')
                    ->orderBy('users.rank', 'asc')
                    ->get();

                break;
        /*** Year vise case ***/
            case('Y'):

                $users = DB::table('users')
                    ->leftJoin('activities', 'users.id', '=', 'activities.user_id')
                    ->select('users.*', DB::raw('SUM(activities.point) as total_points'))
                    ->whereMonth('activities.time', '=', date('d'))
                    ->groupBy('users.id')
                    ->orderBy('users.rank', 'asc')
                    ->get();

                break;
            default:

                $msg = 'Something went wrong. No data !!!';
        }

        $response['users'] = $users ?? [];
        $response['message'] = $msg ?? '';

        return $response;
    }



}

?>
