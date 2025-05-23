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
                'cpf' => 'Lorem ipsum ',
                'nome' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'celular' => 'Lorem ipsum d',
                'password' => 'Lorem ipsum dolor sit amet',
                'ativo' => 'L',
                'created' => '2025-05-23 17:43:11',
                'modified' => '2025-05-23 17:43:11',
            ],
        ];
        parent::init();
    }
}
