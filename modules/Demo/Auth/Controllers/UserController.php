<?php namespace App\Demo\Auth\Controllers;

/**
 * Class UserController
 *
 * @package Acme\Pages\Controllers
 */

use Maduser\Minimal\Facades\Router;

/**
 * Class UserController
 *
 * @package App\Demo\Controllers
 */
class UserController
{
    /**
     * @return array
     */
    public function all()
    {
        return [
            [
                'firstname' => 'Jon',
                'lastname' => 'Doe',
                'username' => 'jondoe'
            ],
            [
                'firstname' => 'Jane',
                'lastname' => 'Doe',
                'username' => 'janedoe'
            ],
        ];
    }

    /**
     * @return string
     */
    public function createForm()
    {
        return 'Imagine a user form';
    }

    /**
     * @return string
     */
    public function editForm($id)
    {
        return 'Imagine a user form for user with $id = '.$id;
    }
}