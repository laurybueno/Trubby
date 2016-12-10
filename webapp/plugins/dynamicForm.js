var regex = /^(.*)(\d)+$/i;
//var regex = /\[.*?\]/i;
var cloneIndex = $(".clonedInput").length + 1;

function modify_qty(val) {
    var contador = document.getElementById('contador').value;
    var new_contador = parseInt(contador,10) + val;
    
    if (new_contador < 1) {
        new_contador = 1;
    }
    
    document.getElementById('contador').value = new_contador;
    return new_contador;
}

function clone() {
    $(this).parents(".clonedInput").clone()
        .appendTo(".tbodyClone")
        .attr("id", "clonedInput" + cloneIndex)
        .attr("name", "clonedInput" + cloneIndex)
        .find("*")
        .each(function () {
            var id = this.id || "";
            var match = id.match(regex) || [];
            if (match.length == 3) {
                //window.alert(match.length);
                //window.alert(match.toString());
                this.id = match[1] + (cloneIndex);
                //window.alert(this.id);
            }
        })
        
        .each(function () {
            var name = this.name || "";
            var match = name.match(regex) || [];
            if (match.length == 3) {
                this.name = match[1] + (cloneIndex);
            }
        })
        
        .on('click', 'clone', clone)
        .on('click', 'remove', remove);

    modify_qty(1);
    cloneIndex++;

    //se tem só uma linha esconde o delete
    console.log("Total de linhas => " + $(".clonedInput").length);
    
    /*
    if ($(".clonedInput").length == 0) {
        window.alert("Escondeu if dentro do clone");
        $('.remove').hide();
    } else {
        $('.remove').show();
    }
    */

}
function remove() {        
    //window.alert($(".clonedInput").length);
    if($(".clonedInput").length > 1){
        $(this).parents(".clonedInput").remove();
    } else {
        window.alert("Tem que ter pelo menos um ingrediente!");
    }
    /*
    if ($(".clonedInput").length == 0) {
        window.alert("Escondeu if dentro do remove");
        $('.remove').hide();
    } else {
        $('.remove').show();
    }
    */

    modify_qty(-1);
}

$(document).on("click", ".clone", clone);
$(document).on("click", ".remove", remove);
