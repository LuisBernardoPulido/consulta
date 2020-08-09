$(document).ready(function(){
    $('body').on('keyup', '.select2-search__field', function() {
        var selectItem = $('.select2-container--open').prev();
        var index = selectItem.index();
        var id = selectItem.attr('id');

        if(id == 'seleccionpreviasearch-c01_id'){
            $('.select2-search__field').mask('00-000-0000-AAA');
        }else{
            $('.select2-search__field').unmask();
        }
    });
});

function buscararete(){
    var tipo = document.getElementById('consultas-p10_tipo').value;
    var arete = document.getElementById('arete').value;
    var id = document.getElementById('id').value;
    if(tipo==0){
        $.ajax({
            type: 'GET',
            url: 'index.php?r=consultas/tbarete',
            data: {"id": id, "arete":arete},
            dataType: "json",
            success: function (res) {
                if(res[0]!=""){
                    document.getElementById('res').value = res[0];
                }else{
                    document.getElementById('res').value = "N/A";
                }

            }
        });
    }
    if(tipo==1){
        $.ajax({
            type: 'GET',
            url: 'index.php?r=consultas/brarete',
            data: {"id": id, "arete":arete},
            dataType: "json",
            success: function (res) {
                if(res[0]!=""){
                    document.getElementById('res').value = res[0];
                }else{
                    document.getElementById('res').value = "N/A";
                }

            }
        });
    }


}

function buscar(){
    var tipo = document.getElementById('consultas-p10_tipo').value;
    var valor = document.getElementById('consultas-p10_valor').value;

    if(tipo==0){
        $.ajax({
            type: 'GET',
            url: 'index.php?r=consultas/tb',
            data: {"valor": valor},
            dataType: "json",
            success: function (res) {
                if(res[0]!=""){
                    $( "#no" ).fadeOut( "fast", function() {
                        $( "#yes" ).fadeIn( "slow", function() {
                            $( "#resultados" ).fadeIn( "slow", function() {
                                document.getElementById('tipo').value = res[0];
                                document.getElementById('unidad').value = res[1];
                                document.getElementById('cabezas').value = res[2];
                                document.getElementById('id').value = res[3];
                            });
                        });
                    });
                }else{

                    $( "#yes" ).fadeOut( "fast", function() {
                        $( "#no" ).fadeIn( "slow", function() {
                            $( "#resultados" ).fadeOut( "slow", function() {

                            });
                        });
                    });
                }

            }
        });
    }

    if(tipo==1){
        $.ajax({
            type: 'GET',
            url: 'index.php?r=consultas/br',
            data: {"valor": valor},
            dataType: "json",
            success: function (res) {
                if(res[0]!=""){
                    $( "#no" ).fadeOut( "fast", function() {
                        $( "#yes" ).fadeIn( "slow", function() {
                            $( "#resultados" ).fadeIn( "slow", function() {
                                document.getElementById('tipo').value = res[0];
                                document.getElementById('unidad').value = res[1];
                                document.getElementById('cabezas').value = res[2];
                                document.getElementById('id').value = res[3];
                            });
                        });
                    });
                }else{

                    $( "#yes" ).fadeOut( "fast", function() {
                        $( "#no" ).fadeIn( "slow", function() {
                            $( "#resultados" ).fadeOut( "slow", function() {

                            });
                        });
                    });
                }

            }
        });
    }
    if(tipo==2){

    }

}

