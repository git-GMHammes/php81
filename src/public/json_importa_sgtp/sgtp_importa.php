<?php
// função Randon
function myRandonN()
{
    return rand(0, 9);
};
function myRandonC()
{
    return chr(rand(65, 90));
};
function mySetKey()
{
    $key = myRandonC();
    for ($i = 0; $i < 13; $i++) {
        $key .= myRandonN();
    };
    return $key;
}
function myCheck()
{
    return rand(1, 10) <= 6 ? 'true' : 'false';
}
function myDate()
{
    return date('d/m/Y H:i', rand(strtotime('2024-01-01'), time()));
}
function mySetDate($check)
{
    return ($check == 'true') ? (myDate()) : ('false');
}
// Caminho para o arquivo TXT
$filePath = "sgtp_importa.txt";
// Verifica se o arquivo existe
if (file_exists($filePath)) {
    // Abre o arquivo para leitura
    $file = fopen($filePath, "r");

    // Lê cada linha do arquivo
    echo '[';
    while (!feof($file)) {
        $check = myCheck();
        $line = fgets($file);
        // echo htmlspecialchars($line) . "<br>";
        echo "
        {
            \"id\": \"" . mySetKey() . "\",
            \"content\": \"" . htmlspecialchars($line) . "\",
            \"isEditing\": \"" . $check . "\",
            \"checked_at\": \"" . mySetDate($check) . "\"
          }, 
        ";
    }
    echo ']';
    // Fecha o arquivo
    fclose($file);
} else {
    echo "O arquivo não foi encontrado.";
}
