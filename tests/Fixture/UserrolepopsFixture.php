<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserrolepopsFixture
 */
class UserrolepopsFixture extends TestFixture
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
                'created' => '2025-05-23 17:43:11',
                'modified' => '2025-05-23 17:43:11',
                'user_id' => 1,
                'role_id' => 1,
            ],
        ];
        parent::init();
    }
}
