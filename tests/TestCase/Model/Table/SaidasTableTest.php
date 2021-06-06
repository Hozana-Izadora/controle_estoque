<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SaidasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SaidasTable Test Case
 */
class SaidasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SaidasTable
     */
    protected $Saidas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Saidas',
        'app.Lojas',
        'app.Transportadoras',
        'app.Itemsaidas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Saidas') ? [] : ['className' => SaidasTable::class];
        $this->Saidas = $this->getTableLocator()->get('Saidas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Saidas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
