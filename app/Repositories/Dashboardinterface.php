<?php

namespace App\Repositories;

interface DashboardInterface{

    public function getUser();

    public function getFilterData($userId);

    public function dataSorting($data);
}

?>
