$(document).ready(function () {
    $("select[name='nome_produto']").change(function () {
        var $preco_produto = $("input[name='preco_produto']");        
        var nome_produto = $(this).val();		
        
        $.getJSON('pesq_valor.php', {nome_produto},
            function(retorno){
                $preco_produto.val(retorno.valor);                
            }
        );        
    });
});