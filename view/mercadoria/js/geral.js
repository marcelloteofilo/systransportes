var autocomp_descricao = ["\x41\x63\x74\x69\x6F\x6E\x53\x63\x72\x69\x70\x74", "\x41\x70\x70\x6C\x65\x53\x63\x72\x69\x70\x74", "\x41\x73\x70", "\x42\x41\x53\x49\x43", "\x43", "\x43\x2B\x2B", "\x43\x6C\x6F\x6A\x75\x72\x65", "\x43\x4F\x42\x4F\x4C", "\x43\x6F\x6C\x64\x46\x75\x73\x69\x6F\x6E", "\x45\x72\x6C\x61\x6E\x67", "\x46\x6F\x72\x74\x72\x61\x6E", "\x47\x72\x6F\x6F\x76\x79", "\x48\x61\x73\x6B\x65\x6C\x6C", "\x4A\x61\x76\x61", "\x4A\x61\x76\x61\x53\x63\x72\x69\x70\x74", "\x4C\x69\x73\x70", "\x50\x65\x72\x6C", "\x50\x48\x50", "\x50\x79\x74\x68\x6F\x6E", "\x52\x75\x62\x79", "\x53\x63\x61\x6C\x61", "\x53\x63\x68\x65\x6D\x65"];
function autoCompletar() {
    $("\x2E\x64\x65\x73\x63\x72\x69\x63\x61\x6F")["\x61\x75\x74\x6F\x63\x6F\x6D\x70\x6C\x65\x74\x65"]({source: autocomp_descricao});
}
;
function mask() {
    $("\x2E\x76\x61\x6C\x6F\x72\x55\x6E\x69\x74\x61\x72\x69\x6F")["\x6D\x61\x73\x6B"]("\x30\x30\x30\x2E\x30\x30\x30\x2E\x30\x30\x30\x2C\x30\x30", {reverse: true, placeholder: "\x30\x2C\x30\x30"});
    $("\x2E\x64\x61\x74\x61")["\x6D\x61\x73\x6B"]("\x30\x30\x2F\x30\x30\x2F\x30\x30\x30\x30", {placeholder: "\x5F\x5F\x2F\x5F\x5F\x2F\x5F\x5F\x5F\x5F"});
}
;
function removeLinha() {
    $("\x2E\x62\x6F\x74\x61\x6F\x52\x65\x6D\x6F\x76\x65\x72")["\x6F\x66\x66"]("\x63\x6C\x69\x63\x6B");
    $("\x2E\x62\x6F\x74\x61\x6F\x52\x65\x6D\x6F\x76\x65\x72")["\x6F\x6E"]("\x63\x6C\x69\x63\x6B", function () {
        if ($("\x74\x72\x2E\x6C\x69\x6E\x68\x61\x73")["\x6C\x65\x6E\x67\x74\x68"] > 1) {
            $(this)["\x70\x61\x72\x65\x6E\x74"]()["\x70\x61\x72\x65\x6E\x74"]()["\x72\x65\x6D\x6F\x76\x65"]();
            calculaTotalGeral();
        }
        ;
    });
}
;
function adicionaLinha() {
    var _0xdd00x5 = $("\x23\x71\x74\x64\x4C\x69\x6E\x68\x61\x73")["\x76\x61\x6C"]();
    for (var _0xdd00x6 = 0; _0xdd00x6 < _0xdd00x5; _0xdd00x6++) {
        novoCampo = $("\x74\x72\x2E\x6C\x69\x6E\x68\x61\x73\x3A\x66\x69\x72\x73\x74")["\x63\x6C\x6F\x6E\x65"]();
        idLinha = parseInt($("\x74\x72\x2E\x6C\x69\x6E\x68\x61\x73\x3A\x6C\x61\x73\x74")["\x70\x72\x6F\x70"]("\x69\x64")["\x73\x70\x6C\x69\x74"]("\x69\x74\x65\x6D\x5F")[1]) + 1;
        novoCampo["\x66\x69\x6E\x64"]("\x69\x6E\x70\x75\x74")["\x76\x61\x6C"]("");
        novoCampo["\x69\x6E\x73\x65\x72\x74\x41\x66\x74\x65\x72"]("\x74\x72\x2E\x6C\x69\x6E\x68\x61\x73\x3A\x6C\x61\x73\x74")["\x61\x74\x74\x72"]("\x69\x64", "\x69\x74\x65\x6D\x5F" + idLinha)["\x66\x69\x6E\x64"]("\x73\x70\x61\x6E")["\x68\x74\x6D\x6C"](idLinha);
        removeLinha();
        mask();
        autoCompletar();
    }
    ;
}
;
function formatarValor(_0xdd00x8) {
    _0xdd00x8 = _0xdd00x8["\x72\x65\x70\x6C\x61\x63\x65"]("\x2E", "");
    _0xdd00x8 = _0xdd00x8["\x72\x65\x70\x6C\x61\x63\x65"]("\x2C", "\x2E");
    return parseFloat(_0xdd00x8);
}
;
function exibirValor(_0xdd00x8) {
    tam = _0xdd00x8["\x6C\x65\x6E\x67\x74\x68"];
    if (tam <= 2) {
        return _0xdd00x8;
    }
    ;
    if ((tam > 2) && (tam <= 6)) {
        return _0xdd00x8["\x72\x65\x70\x6C\x61\x63\x65"]("\x2E", "\x2C");
    }
    ;
    if ((tam > 6) && (tam <= 9)) {
        return _0xdd00x8["\x73\x75\x62\x73\x74\x72"](0, tam - 6) + "\x2E" + _0xdd00x8["\x73\x75\x62\x73\x74\x72"](tam - 6, 3) + "\x2C" + _0xdd00x8["\x73\x75\x62\x73\x74\x72"](tam - 2, tam);
    }
    ;
    if ((tam > 9) && (tam <= 12)) {
        return _0xdd00x8["\x73\x75\x62\x73\x74\x72"](0, tam - 9) + "\x2E" + _0xdd00x8["\x73\x75\x62\x73\x74\x72"](tam - 6, 3) + "\x2E" + _0xdd00x8["\x73\x75\x62\x73\x74\x72"](tam - 6, 3) + "\x2C" + _0xdd00x8["\x73\x75\x62\x73\x74\x72"](tam - 2, tam);
    }
    ;
}
;
function calculaTotalGeral() {
    var _0xdd00xb = 0;
    $("\x69\x6E\x70\x75\x74\x5B\x6E\x61\x6D\x65\x3D\x22\x76\x61\x6C\x6F\x72\x54\x6F\x74\x61\x6C\x5B\x5D\x22\x5D")["\x65\x61\x63\x68"](function () {
        valor = formatarValor($(this)["\x76\x61\x6C"]());
        if (isNaN(valor)) {
            _0xdd00xb += parseInt(0);
        } else {
            _0xdd00xb += valor;
        }
        ;
    });
    $("\x23\x74\x6F\x74\x61\x6C\x47\x65\x72\x61\x6C")["\x68\x74\x6D\x6C"](exibirValor(_0xdd00xb["\x74\x6F\x46\x69\x78\x65\x64"](2)));
}
;
function mostraMSG(_0xdd00xd) {
    $("\x23\x70\x72\x6F\x63\x65\x73\x73\x61\x6E\x64\x6F")["\x73\x68\x6F\x77"]()["\x68\x74\x6D\x6C"](decodeURIComponent(_0xdd00xd));
}
;
function escondeMSG() {
    setTimeout(function () {
        $("\x23\x70\x72\x6F\x63\x65\x73\x73\x61\x6E\x64\x6F")["\x68\x69\x64\x65"]()["\x68\x74\x6D\x6C"]("");
    }, 2000);
}
;
document["\x6F\x6E\x6B\x65\x79\x75\x70"] = function (_0xdd00xf) {
    if (_0xdd00xf["\x77\x68\x69\x63\x68"] == 113) {
        adicionaLinha();
    }
    ;
};
$(function () {
    $("\x23\x66\x6F\x72\x6D")["\x76\x61\x6C\x69\x64\x61\x74\x69\x6F\x6E\x45\x6E\x67\x69\x6E\x65"]("\x61\x74\x74\x61\x63\x68", {onValidationComplete: function (_0xdd00x10, _0xdd00x11) {
            if (_0xdd00x11 == true) {
                var _0xdd00x12 = $("\x23\x66\x6F\x72\x6D")["\x73\x65\x72\x69\x61\x6C\x69\x7A\x65\x41\x72\x72\x61\x79"]();
                var _0xdd00x13 = "";
                $["\x65\x61\x63\x68"](_0xdd00x12, function (_0xdd00x6, _0xdd00x14) {
                    _0xdd00x6++;
                    _0xdd00x13 += _0xdd00x14["\x6E\x61\x6D\x65"] + "\x2D\x2D\x3E" + _0xdd00x14["\x76\x61\x6C\x75\x65"] + "\x3C\x62\x72\x3E";
                    if (((_0xdd00x6 % 6) == 0)) {
                        _0xdd00x13 += "\x3C\x68\x72\x3E";
                    }
                    ;
                });
                mostraMSG(_0xdd00x13);
            }
            ;
        }});
    $("\x23\x62\x6F\x74\x61\x6F\x41\x64\x69\x63\x69\x6F\x6E\x61\x72")["\x6F\x6E"]("\x63\x6C\x69\x63\x6B", adicionaLinha);
    $("\x23\x62\x6F\x74\x61\x6F\x4C\x69\x6D\x70\x61\x72")["\x63\x6C\x69\x63\x6B"](function () {
        $("\x23\x74\x6F\x74\x61\x6C\x47\x65\x72\x61\x6C")["\x68\x74\x6D\x6C"]("\x30\x2C\x30\x30");
    });
    $("\x23\x62\x6F\x74\x61\x6F\x52\x65\x6D\x6F\x76\x65\x72\x54\x75\x64\x6F")["\x63\x6C\x69\x63\x6B"](function () {
        var _0xdd00x15 = $("\x74\x72\x2E\x6C\x69\x6E\x68\x61\x73")["\x6C\x65\x6E\x67\x74\x68"];
        for (var _0xdd00x6 = 1; _0xdd00x6 < _0xdd00x15; _0xdd00x6++) {
            $("\x74\x72\x2E\x6C\x69\x6E\x68\x61\x73\x3A\x6C\x61\x73\x74")["\x72\x65\x6D\x6F\x76\x65"]();
        }
        ;
        $("\x74\x72\x23\x69\x74\x65\x6D\x5F\x31")["\x66\x69\x6E\x64"]("\x69\x6E\x70\x75\x74")["\x76\x61\x6C"]("");
        calculaTotalGeral();
    });
    $("\x74\x61\x62\x6C\x65")["\x6F\x6E"]("\x63\x68\x61\x6E\x67\x65", "\x73\x65\x6C\x65\x63\x74", function () {
        var _0xdd00x16 = $(this)["\x70\x61\x72\x65\x6E\x74"]()["\x70\x61\x72\x65\x6E\x74"]()["\x70\x72\x6F\x70"]("\x69\x64")["\x73\x70\x6C\x69\x74"]("\x69\x74\x65\x6D\x5F")[1];
        mostraMSG("\x56\x6F\x63\xEA\x20\x65\x73\x74\xE1\x20\x6E\x61\x20\x6C\x69\x6E\x68\x61\x20" + _0xdd00x16);
        escondeMSG();
    });
    $("\x74\x61\x62\x6C\x65")["\x6F\x6E"]("\x6B\x65\x79\x75\x70", "\x69\x6E\x70\x75\x74", function () {
        var _0xdd00x17 = $(this)["\x70\x61\x72\x65\x6E\x74"]()["\x70\x61\x72\x65\x6E\x74"]()["\x70\x72\x6F\x70"]("\x69\x64")["\x73\x70\x6C\x69\x74"]("\x69\x74\x65\x6D\x5F")[1];
        var _0xdd00x18 = parseInt($("\x74\x72\x23\x69\x74\x65\x6D\x5F" + _0xdd00x17)["\x66\x69\x6E\x64"]("\x23\x71\x75\x61\x6E\x74\x69\x64\x61\x64\x65")["\x76\x61\x6C"]());
        var _0xdd00x19 = formatarValor($("\x74\x72\x23\x69\x74\x65\x6D\x5F" + _0xdd00x17)["\x66\x69\x6E\x64"]("\x23\x76\x61\x6C\x6F\x72\x55\x6E\x69\x74\x61\x72\x69\x6F")["\x76\x61\x6C"]());
        var _0xdd00x1a = (_0xdd00x18 * _0xdd00x19);
        if (isNaN(_0xdd00x1a)) {
            _0xdd00x1a = "\x30\x2E\x30\x30";
        } else {
            _0xdd00x1a = exibirValor(_0xdd00x1a["\x74\x6F\x46\x69\x78\x65\x64"](2));
        }
        ;
        $("\x74\x72\x23\x69\x74\x65\x6D\x5F" + _0xdd00x17)["\x66\x69\x6E\x64"]("\x23\x76\x61\x6C\x6F\x72\x54\x6F\x74\x61\x6C")["\x76\x61\x6C"](_0xdd00x1a);
        calculaTotalGeral();
    });
    mask();
    autoCompletar();
});