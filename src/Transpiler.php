<?php

namespace nvan\BabelTranspiler;

final class Transpiler
{
    private string $babelProjectDirectory;

    public function __construct(string $babelProjectDirectory)
    {
        $this->babelProjectDirectory = $babelProjectDirectory;
    }

    public function &transpile(string $script): string
    {
        $currentWorkingDirectory = getcwd();
        chdir($this->babelProjectDirectory);

        try {
            $temporaryFile = tmpfile();
            fwrite($temporaryFile, $script);
        } catch (\Exception $e) {
            throw new FileException(
                'Cannot allocate temporary file: ' . $e->getMessage()
            );
        }

        $result = shell_exec(
            'npx babel ' .
            stream_get_meta_data($temporaryFile)['uri']
        );

        fclose($temporaryFile);
        chdir($currentWorkingDirectory);

        if ($result === null) {
            throw new TranspileException;
        }

        return $result;
    }

    public function &transpileFile(string $path): string
    {
        try {
            $fileContent = file_get_contents($path);
        } catch (\Exception $e) {
            throw new FileException(
                'Cannot read file to transpile: ' . $e->getMessage()
            );
        }
        return $this->transpile($fileContent);
    }
}

