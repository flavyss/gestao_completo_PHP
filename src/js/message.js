const message = () => {
    let campo = document.querySelector(".message")
    let disp1 = document.querySelector(".new")
    let fechado = document.querySelector(".fechado")


    fechado.addEventListener("click", () => {
        campo.classList.remove("messap")
    })
    disp1.addEventListener("click", () => {
        campo.classList.add("messap")
    })



}

message()