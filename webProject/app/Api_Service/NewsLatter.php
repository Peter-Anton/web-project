<?php
namespace App\Api_Service;

Interface NewsLatter{
    public function subscriber(string $email, string $list = null);
}
