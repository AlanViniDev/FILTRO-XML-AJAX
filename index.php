<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script src = "https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Filtro em AJAX e XML</title>
</head>
<body>

    <!-- Select de veículos -->
    <select id = "veiculos">
        <option>Selecionar Veículo</option>
        <option value = "1">Honda Civic</option>
        <option value = "2">Toyota Corolla</option>
    </select>

    <!-- select de motocicletas -->
    <select id = "motocicletas">
        <option>Selecionar Motocicleta</option>
        <option value = "3">Honda CB-600F Hornet</option>
        <option value = "4">Yamaha YZF-R1</option>
    </select>
    
    <!-- Resultado filtro -->
    <div id = "marca"></div>
    <div id = "modelo"></div>
    <img id = "imagem"/>

</body>
</html>

<!-- JavaScript -->
<script type = "text/javascript">

// Variavel gloabal. Necessária  para capturar o valor xml retornado no ajax.
var resultadoxml;

// Variaveis para trabalhar com DOM.
var parser, xmlDoc;

// Requisição ajax no arquivo XML.
$(document).ready(function() {
    
    $.ajax({
        type: 'POST',
        dataType: 'html',
        url: 'veiculos.xml',
        success: function (resultado) {
            
            // Atribui o resultado da requisição a variavel global.
            resultadoxml = resultado;
            
            //converte o resultado da requisição para string
            xmlDoc = parser.parseFromString(resultadoxml,"text/xml");
         
        }
    });
});

/* DOM */
parser = new DOMParser();

document.getElementById("veiculos").onchange = function() {

    // Responsavel por capturar o value do select.
    var value = document.getElementById("veiculos").value;

    
    // Filtro civic.
    if (value == 1) {
        document.getElementById("marca").innerHTML = xmlDoc.getElementsByTagName("MARCA")[0].childNodes[0].nodeValue;
        document.getElementById("modelo").innerHTML = xmlDoc.getElementsByTagName("MODELO")[0].childNodes[0].nodeValue;
        document.getElementById("imagem").src = xmlDoc.getElementsByTagName("CAMINHO")[0].childNodes[0].nodeValue;
    }

    // Filtro corolla.
    if (value == 2) {
        document.getElementById("marca").innerHTML = xmlDoc.getElementsByTagName("MARCA")[1].childNodes[0].nodeValue;
        document.getElementById("modelo").innerHTML = xmlDoc.getElementsByTagName("MODELO")[1].childNodes[0].nodeValue;
        document.getElementById("imagem").src = xmlDoc.getElementsByTagName("CAMINHO")[1].childNodes[0].nodeValue;
    }

};

document.getElementById("motocicletas").onchange = function() {

    // Responsavel por capturar o value do select.
    var value = document.getElementById("motocicletas").value;

    // Filtro hornet.
    if (value == 3) {
        document.getElementById("marca").innerHTML = xmlDoc.getElementsByTagName("MARCA")[2].childNodes[0].nodeValue;
        document.getElementById("modelo").innerHTML = xmlDoc.getElementsByTagName("MODELO")[2].childNodes[0].nodeValue;
        document.getElementById("imagem").src = xmlDoc.getElementsByTagName("CAMINHO")[2].childNodes[0].nodeValue;
    }

    // Filtro r1.
    if (value == 4) {
        document.getElementById("marca").innerHTML = xmlDoc.getElementsByTagName("MARCA")[3].childNodes[0].nodeValue;
        document.getElementById("modelo").innerHTML = xmlDoc.getElementsByTagName("MODELO")[3].childNodes[0].nodeValue;
        document.getElementById("imagem").src = xmlDoc.getElementsByTagName("CAMINHO")[3].childNodes[0].nodeValue;
    }

};

</script>
