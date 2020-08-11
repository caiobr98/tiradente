<?php

namespace App;


use App\Notifications\NotificacoesFirebase;
use Illuminate\Database\Eloquent\Model;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Utils extends Model
{
    static function formatDateTimeToView($datetime, $format = "d/m/Y H:i:s")
    {
        date_default_timezone_set('America/Sao_Paulo');

        if ($datetime != null) {
            $tmp = strtotime($datetime);
            return date($format, $tmp);
        }
    }

    static function explodeDateTime($datetime)
    {
        $d = self::formatDateTimeToView($datetime);

        $d = explode(' ', $d);

        $h = explode(":", $d[1]);

        $d[1] = $h[0] . ":" . $h[1];

        return $d;
    }

    static function convertFromDateRange($dateRange)
    {
        $datas = explode(' - ', $dateRange);

        $saida = [];

        foreach ($datas as $d) {
            $saida[] = implode('-', array_reverse(explode("/", $d)));
        }

        return $saida;
    }

    /**
     * Converte array de data do banco em um data range estilo DD/MM/YYYY - DD/MM/YYYY
     * @param $datas
     * @return string
     */
    static function convertToDateRange($datas)
    {
        $saida = [];
        foreach ($datas as $d) {
            $saida[] = implode('/', array_reverse(explode("-", $d)));
        }

        return implode(' - ', $saida);
    }

    /**
     * Converte a data no formato brasileiro para formato de banco de dados
     * @param $data - DD/MM/YYYY
     * @return string - YYYY-MM-DD
     * */
    static function convertFromDateBr($data)
    {
        return implode('-', array_reverse(explode('/', $data)));
    }

    /**
     * Converte a data no formato do bd para formato BR
     * @param $data - YYYY-MM-DD
     * @return string - DD/MM/YYYY
     * */
    static function convertToDateBr($data)
    {
        return implode('/', array_reverse(explode('-', $data)));
    }

    /**
     * @param $datetime
     * @param string $format
     * @return false|string
     * recebe uma data Y-m-d H:i converte para d/m/Y
     */
    static function formatDateTimeToDate($datetime, $format = "d/m/Y")
    {
        date_default_timezone_set('America/Sao_Paulo');

        if ($datetime != null) {
            $tmp = strtotime($datetime);
            return date($format, $tmp);
        }
    }

    /**
     * Recebe uma data no formato BR e concatena com um tempo (HH:II)
     * @param $data
     * @param $tempo
     * @return string
     */
    static function concatenarTempo($data, $tempo)
    {
        return self::convertFromDateBr($data) . " " . $tempo;
    }

    /**
     * Converte d-m-y h:i:s e retorna array de data [0] e hora [1]
     */
    static function converterDateTime($dateTime)
    {
        $d = explode(" ", $dateTime);

        return [self::convertToDateBr($d[0]), $d[1]];
    }

    /**
     * Cáculo matemático para validar um CPF
     * @param $cpf - Numero de CPF
     * @return bool
     */
    static function validarCPF($cpf)
    {
        $cpf = preg_replace('/[^0-9]/', '', (string)$cpf);
        // Valida tamanho
        if (strlen($cpf) != 11)
            return false;
        // Calcula e confere primeiro dígito verificador
        for ($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--)
            $soma += $cpf{$i} * $j;
        $resto = $soma % 11;
        if ($cpf{9} != ($resto < 2 ? 0 : 11 - $resto))
            return false;
        // Calcula e confere segundo dígito verificador
        for ($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--)
            $soma += $cpf{$i} * $j;
        $resto = $soma % 11;
        return $cpf{10} == ($resto < 2 ? 0 : 11 - $resto);
    }

    /**
     * Count de Notificacoes nao lidas
     * @param $idnotificado - id do usuario que possui notificacoes nao lidas
     * @return bool
     */
    static function contagemNotificacoesNaoLidas($idnotificado)
    {
        $notificacoes = NotificacoesFirebase::where([
            ['idnotificado', $idnotificado],
            ['read_at', null]
        ])->limit(10)->orderBy('data_criacao', 'desc')->get();

        return $notificacoes;
    }

    /**
     * Count de Notificacoes lidas
     * @param idnotificado - id do usuario que possui notificacoes nao lidas
     * @return bool
     */
    static function contagemNotificacoesLidas($idnotificado)
    {
        $notificacoes = NotificacoesFirebase::where([
            ['idnotificado', $idnotificado],
            ['read_at', '<>', null]
            ])->orderBy('data_atualizacao', 'desc')
            ->limit(10)
            ->get();
        return $notificacoes;
    }

    /**
     * Count de Notificacoes nao lidas
     * @param $idnotificado - id do usuario que possui notificacoes nao lidas
     * @return bool
     */
    static function contagemMensagensSuporteNaoLidas($idnotificado, $idsuporte)
    {
        $results = \DB::select(
            \DB::raw("SELECT * FROM notificacoes_firebase 
        WHERE 
          SUBSTRING_INDEX(SUBSTRING_INDEX(notificacoes_firebase.data,'/','2'), '/', -1) = '$idsuporte'
          and idnotificado = '$idnotificado'
          and titulo like 'Novo Comentário'
          and read_at is null
          "));
        return count($results);
    }

    /**
     * Calculo de diferenca entre data de agora de que a notificacao foi enviada
     * @param $notificacao - dados da notificacao
     * @return bool
     */
    static function calcularDiferencaDateTime($notificacao)
    {
        date_default_timezone_set('America/Sao_Paulo');

        $dataAtual = date('Y-m-d H:i:s');
        $h2 = new \DateTime($dataAtual);

        $h1 = new \DateTime($notificacao->data_criacao);

        // O metodo diff retorna um novo DateInterval-object...
        $diff = $h1->diff($h2);

        $dia = $diff->format('%a');
        if ($dia >= 1) {
            return $diff->format('%r%a dia(s) e %H:%I:%S');
        } else {
            return $diff->format('%H:%I:%S');
        }
    }

    public function usuario_setor($idusuario)
    {
        return $setorUsuario = SetorUsuario::where('idusuario', $idusuario)->get();
    }

    static function separarDiaDaData($data)
    {
        date_default_timezone_set('America/Sao_Paulo');

        $dia = new \DateTime($data);
        return $dia->format('d');
    }

    static function separarDiaDaDataRange($data, $dia)
    {
        $d = explode('-', $data);

        $data1 = Utils::convertFromDateBr($d[0]);

        $data2 = Utils::convertFromDateBr($d[1]);


        if($data1 <= $data2){
            $data_inicio = new \DateTime($data1);

            $data_fim = new \DateTime($data2);


//            if($dia == $data_inicio->format('d') ||  $dia == $data_fim->format('d')){
//                return "X";
//            }


            if($dia == $data_inicio->format('d') || $dia <= $data_fim->format('d')){
//                if ($dia <= $data_fim->format('d')){
//                    dd($dia);
                    return"X";
//                }
            }

        }
    }

    /**
     * @param $rows Lista de objetos
     * @param $value Atributo que representa o valor
     * @param $desc  Atributo que servirá como label
     * @param string $selected Valor pré selecionado
     * @return string Options do HTML
     */
    static function options($rows, $value, $desc, $selected = '')
    {
//        dd($desc);
        $options = '';
        foreach ($rows as $r) {
            if ($r->$value == $selected) {
                $s = 'selected=""';
            } else {
                $s = '';
            }

            $options .= "<option value='" . $r->$value . "' " . $s . ">" . $r->$desc . "</option>";
        }

        return $options;
    }

    public static function inputValue($v1, $v2)
    {
        if ($v1) {
            return $v1;
        } else {
            return $v2;
        }
    }


    /*
     * Função recebe da um valor com "." e "," do tipo string e retorna um valor float formatado
     * entrada: 1.236,54
     * saida: 1236.54
     */
    static function formatarDecimalStringToFloat($str)
    {
        if (strstr($str, ",")) {
            $str = str_replace(".", "", $str); // replace dots (thousand seps) with blancs
            $str = str_replace(",", ".", $str); // replace ',' with '.'
        }

        if (preg_match("#([0-9\.]+)#", $str, $match)) { // search for number that may contain '.'
            return floatval($match[0]);
        } else {
            return floatval($str); // take some last chances with floatval
        }
    }

    /*
    * Função recebe da um valor com "." para separar casa decimal do tipo float e retorna um formatado com "," para decimal e "." para un. de milhar
    * entrada: 1236.54
    * saida: 1.236,54
    */
    static function formatarDecimalFloatToString($number, $dec_point = ",", $thousands_sep = ".")
    {
        $tmp = explode('.', $number);
        $out = number_format($tmp[0], 0, $dec_point, $thousands_sep);
        if (isset($tmp[1])) $out .= $dec_point . $tmp[1];

        return $out;
    }

    /**
     *   utilizar os 7 primeiros digitos do RF
     */
    static function formataRF($rf)
    {
        if (!empty($rf)) {
            $rf = str_replace(".", "", $rf);
            $rf = str_replace("/", "", $rf);
        }

        $rf = substr($rf, 0, 3) . "." . substr($rf, 3, 3) . "." . substr($rf, 6, 1);

        return $rf;
    }
    static function formataRg($rg)
    {
        if (!empty($rg)) {
            $rg = str_replace(".", "", $rg);
            $rg = str_replace("-", "", $rg);
        }

//        $rg = substr($rg, 0, 3) . "." . substr($rg, 3, 3) . "." . substr($rg, 6, 1);

        return $rg;
    }
    /*
     * Utilizada para busca com auto complete, onde pode buscar por RF ou Nome
     * Essa função recebe o termo digitado na busca
     * Se o termo digitado for número, ele é formatado com a mascara conforme a digitação, após o 3º e 6º dígito
     * Necessária para Busca de Usuários ao Abrir Chamado
     */
    static function formataTermoBuscaRfOuNome($termo)
    {
        $termo_rf = ctype_digit($termo);
        if ($termo_rf == true) {
            if (strlen($termo) > 3) {
                if (!empty($termo)) {
                    $termo = str_replace(".", "", $termo);
                    $termo = str_replace("/", "", $termo);
                }
                /* Formata Digito por digito o rf, adicionando a mascara conforme a digitacao*/
                if (strlen($termo) > 3 && strlen($termo) <= 6) {
                    return $termo = substr($termo, 0, 3) . "." . substr($termo, 3, 3);
                } else if (strlen($termo) > 6) {
                    return $termo = substr($termo, 0, 3) . "." . substr($termo, 3, 3) . "." . substr($termo, 6, 1);
                }
            } else {
                return $termo;
            }
        }else{
            return $termo;
        }


    }

    /**
     * @param $data
     * @return string
     * recebe a data Y-m-d e retorna a idade de acordo com o ano
     */
    static function calcularIdade($data)
    {
        date_default_timezone_set('America/Sao_Paulo');

        // Separa em dia, mês e ano
        list($dia, $mes, $ano) = explode('/', $data);

        // Descobre que dia é hoje e retorna a unix timestamp
        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        // Descobre a unix timestamp da data de nascimento do fulano
        $nascimento = mktime(0, 0, 0, $mes, $dia, $ano);

        // Depois apenas fazemos o cálculo já citado :)
        $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
        return $idade;
    }

    /**
     * Recebe uma data inicial, um intervalo, e uma data final. Com base nessas informações devolve um array iniciando em $inicio, com intervalo de $intervalo e acaba em $fim
     * @param $inicio String 'Y-m-d H:i:s'
     * @param $intervalo String +1 day'
     * @param $fim String 'Y-m-d H:i:s'
     * @return array
     */
    static function timeRows($inicio, $intervalo, $fim)
    {
        $mixed = [];

        $inicio = strtotime($inicio);

        while ($inicio <= strtotime($fim)) {
            $mixed[] = date('Y-m-d', $inicio);

            $inicio = strtotime(date('Y-m-d', $inicio) . " " . $intervalo);
        }

        return $mixed;
    }

    /**
     * Cáculo matemático para validar um CNPJ
     * @param $CNPJ - Numero de CNPJ
     * @return bool
     */
    static function validarCNPJ($cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string)$cnpj);
        // Valida tamanho
        if (strlen($cnpj) != 14)
            return false;
        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
            return false;
        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    }

    static function converterDateTimeToTime($datetime)
    {
        if (!empty($datetime)) {
            $time = strtotime($datetime);
            return date("H:i:s", $time);
        } else {
            return "";
        }
    }

    /**
     * A funcao recebe um datetime do bd e retorna para a view a data com tempo
     * Usar a funcao em input type="datetime-local"
     * Entrada 2019-12-24 08:00:00
     * Saída 2019-12-24T08:00
     * @param $datetime
     * @return string
     */
    static function formatDateTimeToDateTimeLocalView($datetime){

        return \Carbon\Carbon::parse($datetime)->format('Y-m-d\TH:i');
    }
    static function formatDateTimeToDateTimeLocalSecondsView($datetime){

        return \Carbon\Carbon::parse($datetime)->format('Y-m-d\TH:i:s');
    }
    static function formatDateTimeToDateTimeLocalSecondsBD($datetime){

        return \Carbon\Carbon::parse($datetime)->format('Y-m-d H:i:s');
    }

    static function mascaraRG($val, $mask)  // modo de usar: \App\Utils::mascaraRG($rg, '##.###.###-##')
    {
        $maskared = '';   
        $k = 0;
        for($i = 0; $i<=strlen($mask)-1; $i++){
        
        if($mask[$i] == '#'){
            if(isset($val[$k]))
                $maskared .= $val[$k++];
        }
    
        else
        {
            if(isset($mask[$i]))
                $maskared .= $mask[$i];
            }

        }
        return $maskared;

    }


    static function exibeNomeDoMes($numeroMes){
        $meses = array(
            1 => 'Janeiro',
            2 => 'Fevereiro',
            3 => 'Março',
            4 => 'Abril',
            5 => 'Maio',
            6 => 'Junho',
            7 => 'Julho',
            8 => 'Agosto',
            9 => 'Setembro',
            10 => 'Outubro',
            11 => 'Novembro',
            12 => 'Dezembro'
        );
        $numeroMes = strtolower(substr($numeroMes, 0, 3));
        return $meses[$numeroMes];
    }

}
