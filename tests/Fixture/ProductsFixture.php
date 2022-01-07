<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductsFixture
 */
class ProductsFixture extends TestFixture
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
                'p_name' => 'Lorem ipsum dolor sit amet',
                'p_detail' => 'Lorem ipsum dolor sit amet',
                'p_price' => 1,
                'p_status' => 1,
                'created_at' => '2022-01-07',
            ],
        ];
        parent::init();
    }
}
