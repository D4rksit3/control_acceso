function confirmacion(e) {
    if confirm("¿Estas seguro de eliminar el registro?");{
        return true;
    }else{
        e.preventDefault();
    }
}
let link delete = document.querySelectorAll(".tabla_link");

for (var i =0; i < linkDelete.length; i++){
    linkDelete[i].addEventListener('click',confirmacion);
}