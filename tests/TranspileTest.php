<?php

namespace nvan\BabelTranspiler\Test;

use PHPUnit\Framework\TestCase;
use nvan\BabelTranspiler\Transpiler;

final class TranspileTest extends TestCase
{
    private const SCRIPT_RAW = 'class Test {}';
    private const SCRIPT_PATH = 'Resources/EmptyClass.js';
    private const EXPECTED_RESULT_PATH = 'Resources/TranspiledEmptyClass.js';
    private const BABEL_PATH = 'BabelDirectory';

    private ?Transpiler $transpiler = null;
    private ?string $expectedResult = null;

    private function &getTranspiler(): Transpiler {
        if($this->transpiler === null) {
            $this->transpiler =
                new Transpiler(__DIR__ . '/' . self::BABEL_PATH);
        }

        return $this->transpiler;
    }

    private function removeCarriageReturn(string $str): string {
        return str_replace("\r", '', $str); // TO ENSURE WINDOWS COMPATIBILITY
    }

    private function &getExpectedResult(): string {
        if($this->expectedResult === null) {
            $this->expectedResult = $this->removeCarriageReturn(
                file_get_contents(__DIR__ . '/' . self::EXPECTED_RESULT_PATH)
            );
        }

        return $this->expectedResult;
    }

    public function testTranspile() {
        $this->assertEquals(
            $this->getExpectedResult(),
            $this->getTranspiler()->transpile(self::SCRIPT_RAW)
        );
    }

    public function testTranspileFile() {
        $this->assertEquals(
            $this->getExpectedResult(),
            $this->getTranspiler()
                 ->transpileFile(__DIR__ . '/' . self::SCRIPT_PATH)
        );
    }
}
