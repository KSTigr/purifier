<?php

namespace Chromabits\Purifier\Contracts;

use Exception;

/**
 * Purifier Contract
 *
 * Service for purifying HTML strings or arrays of strings
 *
 * ---
 *
 * This file is part of HTMLPurifier Bundle.
 * (c) 2012 Maxime Dizerens
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * ---
 *
 * Modified for the Laravel 4 HTMLPurifier package
 * Copyright (c) 2013 MeWebStudio
 * Muharrem ERİN <me@mewebstudio.com> http://www.mewebstudio.com
 * http://www.gnu.org/licenses/lgpl-2.1.html GNU Lesser General Public License, version 2.1
 *
 * ---
 *
 * Modified for the Laravel 5 HTMLPurifier package
 * Copyright (c) 2014 Eduardo Trujillo
 *
 * @author Eduardo Trujillo <ed@chromabits.com>
 *
 * @package Chromabits\Purifier
 */
interface Purifier
{
    /**
     * Purify the HTML in the input string or array of strings
     *
     * @param array|string $dirty HTML to clean
     * @param array|string $config
     * @return array|string
     * @throws Exception
     */
    public function clean($dirty, $config = null);
}
