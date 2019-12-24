<?php

declare(strict_types=1);

/*
 * (c) Christian Gripp <mail@core23.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core23\MatomoBundle\Tests\Block;

use Core23\MatomoBundle\Tests\App\AppKernel;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Component\HttpKernel\Client;

final class BlockServiceIntegrationTest extends TestCase
{
    public function testStartup(): void
    {
        if (class_exists(KernelBrowser::class)) {
            $client = new KernelBrowser(new AppKernel());
        } else {
            $client = new Client(new AppKernel());
        }

        $client->request('GET', '/twig-test');

        static::assertSame(200, $client->getResponse()->getStatusCode());
    }
}