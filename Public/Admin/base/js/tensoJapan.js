function clearField(msg, o) {
    if ($(o).val() == msg) {
        $(o).val('');
    }
}

function resetField(msg, o) {
    if ($(o).val() == ''){
        $(o).val(msg);
    }
}

// 兼容 IE 的 Console 错误
function log(msg) {
    if (window.console) { 
        console.log(msg); 
    }
}