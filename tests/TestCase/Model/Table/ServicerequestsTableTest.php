<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ServicerequestsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ServicerequestsTable Test Case
 */
class ServicerequestsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ServicerequestsTable
     */
    protected $Servicerequests;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Servicerequests',
        'app.Services',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Servicerequests') ? [] : ['className' => ServicerequestsTable::class];
        $this->Servicerequests = $this->getTableLocator()->get('Servicerequests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Servicerequests);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ServicerequestsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ServicerequestsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
