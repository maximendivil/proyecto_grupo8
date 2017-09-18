$(document).ready(function(){
    $("#tipoCuota").change(function(){
        if(this.value == 'matricula'){
            $(".invisible").hide();;
        }
        if(this.value == 'mensual'){
            $(".invisible").show();
        }
    });
});