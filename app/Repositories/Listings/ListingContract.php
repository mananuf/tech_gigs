<?php

namespace App\Repositories\Listings;

interface ListingContract
{
    public function displayAll();
    public function findID($id);
    public function create($request);
    public function update($request, $id);
    public function postRegistration($request);
    public function verifyAccount($token);
    public function createUser(array $data);
    public function dashboardDetails();
}
