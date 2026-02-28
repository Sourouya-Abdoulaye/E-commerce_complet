<?php
namespace App\Controllers;

interface Resource {
    public function index();
    public function createForm();
    public function storeAction();
    public function show(int $id);
    public function editForm(int $id);
    public function updateAction(int $id);
    public function deleteAction(int $id);
}
