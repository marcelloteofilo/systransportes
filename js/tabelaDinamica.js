$(document).ready(function ()
{
    $('.add').click(function ()
    {
        var id = parseInt($('#tabelaItens > tbody tr:last input:first').val()) + parseInt(1);
        var descricaoMercadoria;
        var pesoMercadoria;
        var quantidadeMercadoria;
        var valorMercadoria;
        $('#tabelaItens > tbody').append('<tr>\n\n\n\
                    <td><input class="form-control" type="text" name="item[]"\n\
                    value="' + id + '" size="4" readonly="readonly"></td>\n\n\
                    <td><input class="form-control" type="text" id="' + descricaoMercadoria + '" name="descricaoMercadoria[]" value="" size="90" placeholder="Descrição sobre a mercadoria" maxlength="50"></td>\n\n\
                    <td><input class="form-control" type="text" id="' + quantidadeMercadoria + '" name="quantidadeMercadoria[]" value="" size="10" placeholder="0,00" maxlength="8" ></td>\n\n\
                    <td><input class="form-control" type="text" id="' + pesoMercadoria + '" name="pesoMercadoria[]" value="" size="4" placeholder="0,00" maxlength="8"></td>\n\n\
                    <td><input class="form-control" type="text" id="' + valorMercadoria + '" name="valorMercadoria[]" value="" size="4" placeholder="0,00" maxlength="8"></td>\n\n\
                    <td>&nbsp;</td>\n</tr>\n');

        return false;
    });
});