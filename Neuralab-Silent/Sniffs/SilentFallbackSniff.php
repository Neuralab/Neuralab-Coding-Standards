<?php
/** Just a test to confirm the coding standard is loaded */

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

class SilentFallbackSniff implements Sniff
{
    public function register()
    {
        return array(T_COMMENT);
    }

    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        if (substr( $tokens[$stackPtr]['content'], 0, 9 ) === '#neuralab') {
            $warn = 'Neuralab silent linter is working; found %s';
            $data  = array(trim($tokens[$stackPtr]['content']));
            $phpcsFile->addWarning($warn, $stackPtr, 'Found', $data);
        }
    }
}