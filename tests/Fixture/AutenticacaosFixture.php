<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AutenticacaosFixture
 */
class AutenticacaosFixture extends TestFixture
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
                'hash' => 'Lorem ipsum dolor sit amet',
                'expira' => '2025-05-23',
                'ativo' => 'L',
                'created' => '2025-05-23 17:43:10',
                'modified' => '2025-05-23 17:43:10',
                'user_id' => 1,
            ],
        ];
        parent::init();
    }
}
