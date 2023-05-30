<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class isPersonnel implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(!session()->has('loggedUser') ){
            return redirect()->to(base_url('/login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}