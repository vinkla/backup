<?php

/*
 * This file is part of Laravel Backup.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vinkla\Tests\Backup\Sources;

use Illuminate\Contracts\Config\Repository;
use Mockery;
use Vinkla\Backup\Sources\MysqlDumpSource1;
use Vinkla\Tests\Backup\AbstractFactoryTestCase;

/**
 * This is the mysql dump source test class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class MysqlDumpSourceTest extends AbstractFactoryTestCase
{
    public function getFactory()
    {
        $config = Mockery::mock(Repository::class);

        return new MysqlDumpSource1($config);
    }
}
