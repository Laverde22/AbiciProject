const btnAbritModal=
document.querySelector("#btn-abrirmodal");
const btnCerrarModal=
document.querySelector("#btn-cerrar-modal");
const modal =
document.querySelector("#modal");

btnAbritModal.addEventListener("click",()=>
{modal.showModal();})

btnCerrarModal.addEventListener("click",()=>{
    modal.close();
})