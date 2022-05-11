<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    public function view($page = 'home')
    {
        // jika tidak ada file ini maka akan dieksekusi page not found
        if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        echo view('templates/header', $data);
        echo view('pages/' . $page, $data);
        echo view('templates/footer', $data);
    }
}
