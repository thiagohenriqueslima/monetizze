<?php

class LoteriaService
{
    private $quantDezenasPermitidas;
    private $quantDezenas;
    private $resultado;
    private $totalJogos;
    private $jogos;

    public function __construct($quantDezenas, $totalJogos)
    {
        $this->quantDezenas = $quantDezenas;
        $this->totalJogos = $totalJogos;
        $this->quantDezenasPermitidas = [6, 7, 8, 9, 10];
    }

    public function getQuantDezenas()
    {
        return $this->quantDezenas;
    }

    public function getResultado()
    {
        return $this->resultado;
    }

    public function getTotalJogos()
    {
        return $this->totalJogos;
    }

    public function getJogos()
    {
        return $this->jogos;
    }

    public function setQuantDezenas($quantidade)
    {
        try {
            if (in_array($quantidade, $this->quantDezenasPermitidas)) {
                $this->quantDezenas = $quantidade;
            } else {
                throw new Exception("O valor informado não é um valor válido.");
            }
        } catch (Exception $e) {
            die('Ocorreu um erro ao atribuir um valor para a propriedade Quantidade de dezenas. '.$e->getMessage());
        }
    }

    public function setResultado($resultado)
    {
        $this->resultado = $resultado;
    }

    public function setTotalJogos($total)
    {
        $this->totalJogos = $total;
    }

    public function setJogos($jogos)
    {
        $this->jogos = $jogos;
    }

    public function gerarJogos()
    {
        try {
            $jogos = [];
            $quantJogosGerados = 0;

            while ($quantJogosGerados < $this->totalJogos) {
                $jogos[] = $this->gerarDezenas();
                $quantJogosGerados++;
            }

            $this->jogos = $jogos;
            
        } catch (Exception $e) {
            die('Ocorreu um erro ao gerar os jogos. '.$e->getMessage());
        }
    }

    public function realizarSorteio()
    {
        try {
            $dezenas = [];
            $quantDezenasSorteadas = 0;

            while ($quantDezenasSorteadas < 6) {
                $dezena = rand(1, 60);

                if (!in_array($dezena, $dezenas)) {
                    $dezenas[] = $dezena;
                    $quantDezenasSorteadas++;
                }
            }

            sort($dezenas, SORT_NUMERIC);

            $this->resultado = $dezenas;
        } catch (Exception $e) {
            die('Ocorreu um erro ao realizar o sorteio. '.$e->getMessage());
        }
    }

    public function confereResultado()
    {
        $html = "<table border='1'>
                    <thead>
                        <tr>
                            <th style='text-align: center' colspan='4'>Resultado Sorteio</th>
                        </tr>
                        <tr>
                            <td><strong>Data Sorteio: </strong></td>
                            <td>".date('d/m/Y')."</td>
                            <td><strong>Dezenas Sorteadas: </strong></td>
                            <td>".implode(", ", $this->resultado)."</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan='3'>Dezenas</td>
                            <td style='text-align: center;'>Quant. Acerto</td>
                        </tr>
                        ".$this->obterHtmlJogos()."
                    </tbody>
                </table>";

        return $html;
    }

    private function obterHtmlJogos()
    {
        $html = "";

        foreach ($this->jogos as $jogo) {
            $html .= "<tr>
                        <td colspan='3'>".implode(", ", $jogo)."</td>
                        <td style='text-align: center;'>".$this->calcularQuantAcertos($jogo)."</td>
                    </tr>";
        }

        return $html;
    }

    private function calcularQuantAcertos($jogo)
    {
        $resultado = array_intersect($this->resultado, $jogo);
        return count($resultado);
    }

    private function gerarDezenas()
    {
        try {
            if (empty($this->quantDezenas) || !in_array($this->quantDezenas, $this->quantDezenasPermitidas)) {
                throw new Exception("A quantidade de dezenas informada não é um valor válido.");
            }

            $dezenas = [];
            $quantDezenasGeradas = 0;

            while ($quantDezenasGeradas < $this->quantDezenas) {
                $dezena = rand(1, 60);

                if (!in_array($dezena, $dezenas)) {
                    $dezenas[] = $dezena;
                    $quantDezenasGeradas++;
                }
            }

            sort($dezenas, SORT_NUMERIC);

            return $dezenas;
        } catch (Exception $e) {
            die('Ocorreu um erro ao gerar as dezenas. '.$e->getMessage());
        }
    }
}