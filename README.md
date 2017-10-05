# Crypta
Classe para encriptação e decriptação de dados. Está bem inicial MESMO!!! Mas já funciona do jeito que está. Tratativas de erro/exceções devem ser inseridas. 
Utiliza funções de OpenSSL para realização da encriptação/decriptação.

# Método encrypt
Este método é responsável pela encriptação dos dados.
Alimenta:
1 - Crypta::$criptedData    - O dado encriptado
2 - Crypta::$secretKeyIndex - índice utilizado para a seleção da palavra chave presente no array self::$secretKey
3 - Crypta::$timeStampHash  - Timestamp que compõe o hash no processo de encriptação
# Método decript
Este método é responsável por decriptar o dado. Recebe o dado encriptado, a chave do array self::$secretKey utilizado na encriptação e o timestamp utilizado na encriptação.

# self::$secretKey
É um array que deve conter N palavras chaves. Deve estar presente nas duas pontas: Ponta que encripta e na ponta que decripta.
Uma vez que um dado é encriptado, a função encript disponibiliza Crypta::$secretKeyIndex - chave utilizada em self::$secretKey. Assim, esse dado pode transitar entre as pontas sem revelar a real chave de encriptação. O timestamp utilizado na encriptação também deve transitar entre as pontas, mas esse dado não é tão perigoso.

# Uso

 require 'vendor/autoload.php';
 use vendor\Crypta;
 Crypta::encrypt("Olá. Eu serei encriptado agora");
 echo Crypta::$criptedData."\r\n";
 echo "Dado Descriptado\r\n";
 echo Crypta::decrypt(Crypta::$criptedData,Crypta::$secretKeyIndex,Crypta::$timeStampHash);
