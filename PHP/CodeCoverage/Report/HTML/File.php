<?php
/**
 * PHP_CodeCoverage
 *
 * Copyright (c) 2009-2011, Sebastian Bergmann <sb@sebastian-bergmann.de>.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the name of Sebastian Bergmann nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @category   PHP
 * @package    CodeCoverage
 * @author     Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @copyright  2009-2011 Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @license    http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @link       http://github.com/sebastianbergmann/php-code-coverage
 * @since      File available since Release 1.1.0
 */

/**
 * Renders a PHP_CodeCoverage_Report_Node_File node.
 *
 * @category   PHP
 * @package    CodeCoverage
 * @author     Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @copyright  2009-2011 Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @license    http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @version    Release: @package_version@
 * @link       http://github.com/sebastianbergmann/php-code-coverage
 * @since      Class available since Release 1.1.0
 */
class PHP_CodeCoverage_Report_HTML_File
{
    /**
     * @var string
     */
    protected $templatePath;

    /**
     * @var string
     */
    protected $charset;

    /**
     * @var string
     */
    protected $generator;

    /**
     * @var integer
     */
    protected $lowUpperBound;

    /**
     * @var integer
     */
    protected $highLowerBound;

    /**
     * @var boolean
     */
    protected $highlight;

    /**
     * @var boolean
     */
    protected $yui;

    /**
     * Constructor.
     *
     * @param string  $templatePath
     * @param string  $charset
     * @param string  $generator
     * @param integer $lowUpperBound
     * @param integer $highLowerBound
     * @param boolean $highlight
     * @param boolean $yui
     */
    public function __construct($templatePath, $charset, $generator, $lowUpperBound, $highLowerBound, $highlight, $yui)
    {
        $this->templatePath   = $templatePath;
        $this->charset        = $charset;
        $this->generator      = $generator;
        $this->lowUpperBound  = $lowUpperBound;
        $this->highLowerBound = $highLowerBound;
        $this->highlight      = $highlight;
        $this->yui            = $yui;
    }

    /**
     * @param PHP_CodeCoverage_Report_Node_File $node
     * @param string                            $file
     * @param string                            $title
     */
    public function render(PHP_CodeCoverage_Report_Node_File $node, $file, $title = NULL)
    {
        if ($title === NULL) {
            $title = $node->getName();
        }

        if ($this->yui) {
            $template = new Text_Template($this->templatePath . 'file.html');
        } else {
            $template = new Text_Template(
              $this->templatePath . 'file_no_yui.html'
            );
        }

        $template->renderTo($file);
    }
}
