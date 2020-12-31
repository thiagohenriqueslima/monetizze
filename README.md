# Monetizze
Processo Seletivo - Back End PHP

### Descrição
Desenvolvimento de uma classe para realização de sorteios. A classe possibilita a geração de jogos com 6, 7, 8, 9 ou 10 dezenas únicas, geradas aleatoriamente, com valores entre 1 e 60.

A classe também realiza o sorteio de seis dezenas únicas e gera uma tabela com os resultados para conferência, apresentando os jogos gerados e a quantidade de acerto baseado no resultado. Veja no exemplo abaixo:

<table>
    <thead>
        <tr>
            <th style='text-align: center' colspan='4'>Resultado Sorteio</th>
        </tr>
        <tr>
            <td><strong>Data Sorteio: </strong></td>
            <td>31/12/2020</td>
            <td><strong>Dezenas Sorteadas: </strong></td>
            <td>5, 15, 30, 33, 34, 60</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan='3'>Dezenas</td>
            <td style='text-align: center;'>Quant. Acerto</td>
        </tr>
        <tr>
        <td colspan='3'>6, 16, 24, 54, 56, 58</td>
        <td style='text-align: center;'>0</td>
    </tr>
    </tbody>
</table>

### Requisitos
A classe foi desenvolvida utilizando o PHP na versão 7.4.13. Porém é uma classe simples, e deve ser possível executá-la em versões do PHP >= 5.4.

### Execução Local
Além do PHP instalado localmente, é necessário também a instalação de um servidor web, como o <a href="https://www.apache.org/" target="_blank">Apache</a> por exemplo.

Para facilitar a execução do teste, foi criado o arquivo [index](index.php) com a instanciação da classe e as chamadas para gerar os jogos, realizar o sorteio e apresentar o resultado para conferência. Ou seja, para executar o teste basta acessar este arquivo no navegador, como no exemplo abaixo:

<pre>
http://localhost/monetizze/index.php
</pre>

No link acima, entende-se que foi criado uma pasta chamada monetizze dentro do ambiente de desenvolvimento.