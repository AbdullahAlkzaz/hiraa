<?php

namespace App\Repositories\User;

use Illuminate\Http\Request;

interface UserRepositoryInterface
{

    public function getUserByEmail(string $email);
    public function findUnexpiredUser($id);
    public function getUserByToken(string $token);
    public function allWithoutAuthed();
    public function create(array $data);

    public function getUsers(array $data);
    public function getCompanies(array $data);
    public function getCompany(int $id);
    
    public function addCompanyDetails(int $id,  array $data);
    public function deleteCompanyDetail(int $id);
    
    public function getOffices(array $data);
    public function getoffice(int $id);
    
    public function addofficeDetails(int $id,  array $data);
    public function deleteofficeDetail(int $id);
    
    
}
