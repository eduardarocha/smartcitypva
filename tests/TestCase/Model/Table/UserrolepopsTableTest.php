<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserrolepopsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserrolepopsTable Test Case
 */
class UserrolepopsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UserrolepopsTable
     */
    protected $Userrolepops;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Userrolepops',
        'app.Users',
        'app.Roles',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Userrolepops') ? [] : ['className' => UserrolepopsTable::class];
        $this->Userrolepops = $this->getTableLocator()->get('Userrolepops', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Userrolepops);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UserrolepopsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UserrolepopsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
