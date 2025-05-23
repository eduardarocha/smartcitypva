<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserolesFixture
 */
class UserolesFixture extends TestFixture
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
                'ativo' => 'L',
                'created' => '2025-05-16 16:06:58',
                'modified' => '2025-05-16 16:06:58',
                'user_id' => 1,
                'role_id' => 1,
            ],
        ];
        parent::init();
    }
}
