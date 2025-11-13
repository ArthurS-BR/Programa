<?php

/**
 * Cria o arquivo se não existir, adiciona/edita conteúdo e retorna o texto completo.
 *
 * @param string $arquivo Caminho do arquivo de texto que será manipulado.
 * @param string $conteudo Conteúdo que será gravado no final do arquivo.
 * @return string Conteúdo completo do arquivo após a gravação.
 */
function manipularArquivoTexto(string $arquivo, string $conteudo): string
{
    // Garantir que o diretório existe antes de criar o arquivo.
    $diretorio = dirname($arquivo);
    if (!is_dir($diretorio)) {
        mkdir($diretorio, 0777, true);
    }

    // Abre para escrita/apendice; cria caso não exista.
    $handle = fopen($arquivo, 'a+');
    if ($handle === false) {
        throw new RuntimeException("Não foi possível abrir o arquivo: {$arquivo}");
    }

    // Escreve o conteúdo e volta ao início para leitura completa.
    fwrite($handle, $conteudo . PHP_EOL);
    rewind($handle);
    $textoCompleto = stream_get_contents($handle);
    fclose($handle);

    return $textoCompleto;
}

// Exemplo de uso:
try {
    $conteudoAtualizado = manipularArquivoTexto(__DIR__ . '/dados/arquivo.txt', 'Linha adicionada em ' . date('Y-m-d H:i:s'));
    echo "<pre>{$conteudoAtualizado}</pre>";
} catch (RuntimeException $e) {
    echo "Erro: " . $e->getMessage();
}
