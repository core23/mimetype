<?php

/*
 * (c) Christian Gripp <mail@core23.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core23\MimeUtil\Tests;

use Core23\MimeUtil\MimeUtil;
use PHPUnit\Framework\TestCase;

class MimeUtilTest extends TestCase
{
    public function testGetTypeFromExtension()
    {
        $mimeUtil = new MimeUtil();
        $this->assertSame('image/png', $mimeUtil->getTypeFromExtension('PNG'));
    }

    public function testGetTypeFromExtensionUnknownType()
    {
        $mimeUtil = new MimeUtil();
        $this->assertNull($mimeUtil->getTypeFromExtension('foobar'));
    }

    public function testGetTypeFromFilename()
    {
        $mimeUtil = new MimeUtil();
        $this->assertSame('image/png', $mimeUtil->getTypeFromFilename('foo.bar.png'));
    }

    public function testGetTypeFromFilenameUnknownFilename()
    {
        $mimeUtil = new MimeUtil();
        $this->assertNull($mimeUtil->getTypeFromFilename('foobar'));
    }

    public function testGetExtensionsFromType()
    {
        $mimeUtil = new MimeUtil();
        $this->assertSame(array('png'), $mimeUtil->getExtensionsFromType('image/png'));
    }

    public function testGetExtensionsFromTypeMultiple()
    {
        $mimeUtil = new MimeUtil();
        $this->assertSame(array('jpe', 'jpeg', 'jpg'), $mimeUtil->getExtensionsFromType('image/jpeg'));
    }

    public function testGetExtensionsFromTypeUnknown()
    {
        $mimeUtil = new MimeUtil();
        $this->assertSame(array(), $mimeUtil->getExtensionsFromType('foo/bar'));
    }
}
