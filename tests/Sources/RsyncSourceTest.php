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

use Vinkla\Backup\Sources\RsyncSource;

/**
 * This is the rsync source test class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class RsyncSourceTest extends AbstractSourceTestCase
{
    public function getFactory()
    {
        return new RsyncSource();
    }
}