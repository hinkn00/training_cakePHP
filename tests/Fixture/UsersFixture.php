<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'u_name' => 'Lorem ipsum dolor sit amet',
                'u_email' => 'Lorem ipsum dolor sit amet',
                'u_password' => 'Lorem ipsum dolor sit amet',
                'u_token' => 'Lorem ipsum dolor sit amet',
                'created_at' => '2022-01-08',
                'update_at' => '2022-01-08',
            ],
        ];
        parent::init();
    }
}
