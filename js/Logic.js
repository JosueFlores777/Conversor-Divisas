
	var obj = { sta: false, ele: null };
        function Update(ev) {
            if (obj.sta) { return true; };
            swal({
                title: "Estas seguro de actualizar el registro?",
                text: "Si le aparece este mensaje es porque usted esta intentando modificar campos de un usuario",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Actualizar",
                closeOnConfirm: true
            },
function () {
    obj.sta = true;
    obj.ele = ev;
    obj.ele.click();
});
            return false;
        }
        
var object = { status: false, ele: null };
function ConfirmDelete(ev) {
    if (object.status) { return true; };
    swal({
        title: "¿Estas seguro?",
        text: "Si lo eliminas ya no lo podras recuperar!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Eliminar archivo",
        closeOnConfirm: true,
        
    },
function () {
object.status = true;
object.ele = ev;
object.ele.click();
});
    return false;
}


function cambiar()
{

    var seleted = combobox.options[combobox.selectedIndex].text
            if(seleted=="El Salvador"){
                document.querySelector('#IdLa').innerText='Colon SV';
            }else if(seleted=="Honduras"){
                document.querySelector('#IdLa').innerText='Limpira';
            }else if(seleted=="Costa Rica"){
                document.querySelector('#IdLa').innerText='Colon CR';
            }else if(seleted=="Nicaragua"){
                document.querySelector('#IdLa').innerText='Córdoba';
            }else if(seleted=="Guatemala"){
                document.querySelector('#IdLa').innerText='Quetzal';
            }else if(seleted=="Elija una Opcion"){
                swal({
                    title: "Ha fallado con exito!!!",
                    text: "No puede dejar campos vacios",
                    type: "error",
                    confirmButtonText: "Continuar"
                
                  }).then(function() {
                    window.location = "Conversion.php";
                  })
            }
            else{
                swal({
                    title: "Ha fallado con exito!!!",
                    text: "No puede dejar campos vacios",
                    type: "error",
                    confirmButtonText: "Continuar"
                
                  }).then(function() {
                    window.location = "Conversion.php";
                  })
            }     
}

    function convercion(){
        var seleted = combobox.options[combobox.selectedIndex].text
        var Cantidad = document.getElementById("TxtCantidad").value;
        var resultadolo;
        var resultadoDo;
            if(seleted=="El Salvador"){
                     resultadolo= Cantidad*8.75;
                     resultadoDo=Cantidad*0.11;
            
            }else if(seleted=="Honduras"){
                     resultadolo= Cantidad*24.03;
                     resultadoDo=Cantidad*0.041;
            }else if(seleted=="Costa Rica"){
                    resultadolo= Cantidad*601.61;
                    resultadoDo=Cantidad*0.0017;
            }else if(seleted=="Nicaragua"){
                    resultadolo= Cantidad*34.82;
                    resultadoDo=Cantidad*0.029;
            }else if(seleted=="Guatemala"){
                    resultadolo= Cantidad*7.82;
                    resultadoDo=Cantidad*0.13;
            }else if(seleted=="Elija una Opcion"){
                swal({
                    title: "Ha fallado con exito!!!",
                    text: "No puede dejar campos vacios",
                    type: "error",
                    confirmButtonText: "Continuar"
                
                  }).then(function() {
                    window.location = "Conversion.php";
                  })
            }
            else{
                swal({
                    title: "Ha fallado con exito!!!",
                    text: "No puede dejar campos vacios",
                    type: "error",
                    confirmButtonText: "Continuar"
                
                  }).then(function() {
                    window.location = "Conversion.php";
                  })
            }     
            document.querySelector('#Local').textContent=resultadoDo;
            document.querySelector('#Dolar').textContent=resultadolo;

    }
    function Reset(){
        document.getElementById('combobox').selectedIndex = 0;
        document.querySelector('#TxtCantidad').value=" ";
    }

 