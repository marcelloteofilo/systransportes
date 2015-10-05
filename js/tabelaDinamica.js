$(document).ready(function ()
{
    $('.add').click(function ()
    {
        var id = parseInt($('#tabelaItens > tbody tr:last input:first').val()) + parseInt(1);
        var descricao;
        var peso;
        $('#tabelaItens > tbody').append('<tr>\n\n\n\
                    <td><input type="text" name="item[]"\n\
                            value="' + id + '" size="4" readonly="readonly"></td>\n\n\
                    <td><input type="text" id="' + descricao + '" name="descricao[]" value="" size="60"></td>\n\n\
                    <td><input type="text" id="' + peso + '" name="peso[]" value="" size="4"></td>\n\n\
                    <td>&nbsp;</td>\n</tr>\n');

        return false;
    });
});