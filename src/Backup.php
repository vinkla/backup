<?php

/*
 * This file is part of Laravel Backup.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Vinkla\Backup;

use Illuminate\Contracts\Config\Repository;
use Zenstruck\Backup\Executor;
use Zenstruck\Backup\ProfileRegistry;

/**
 * This is the backup class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class Backup
{
    /**
     * The config repository.
     *
     * @var \Illuminate\Contracts\Config\Repository
     */
    protected $config;

    /**
     * The profile registry.
     *
     * @var \Zenstruck\Backup\ProfileRegistry
     */
    protected $registry;

    /**
     * The executor instance.
     *
     * @var \Zenstruck\Backup\Executor
     */
    protected $executor;

    /**
     * The backup profile.
     *
     * @var string
     */
    protected $profile;

    /**
     * Create a new backup instance.
     *
     * @param \Illuminate\Contracts\Config\Repository $config
     * @param \Zenstruck\Backup\ProfileRegistry $registry
     * @param \Zenstruck\Backup\Executor $executor
     *
     * @return void
     */
    public function __construct(Repository $config, ProfileRegistry $registry, Executor $executor)
    {
        $this->config = $config;
        $this->registry = $registry;
        $this->executor = $executor;
    }

    /**
     * Get the backup profile.
     *
     * @return string
     */
    public function getProfile(): string
    {
        if ($this->profile) {
            return $this->profile;
        }

        return $this->config->get('backup.default');
    }

    /**
     * Set the backup profile.
     *
     * @param string $profile
     *
     * @return void
     */
    public function setProfile(string $profile)
    {
        $this->profile = $profile;
    }

    /**
     * Set the backup profile.
     *
     * @param string $profile
     *
     * @return $this
     */
    public function profile(string $profile): self
    {
        $this->setProfile($profile);

        return $this;
    }

    /**
     * Execute the backup.
     *
     * @param bool $clear
     *
     * @return void
     */
    public function run(bool $clear = false)
    {
        $profile = $this->registry->get($this->getProfile());

        $this->executor->backup($profile, $clear);
    }
}
