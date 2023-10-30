const menu = () => {
    let ativa = document.querySelector(".ativa")
    let campo = document.querySelector(".campo") 
    let fecha = document.querySelector(".fecha")
    
    
    ativa.addEventListener("click", () => {
        if(campo.classList.contains("aparece")){
            campo.classList.remove("aparece")
        }
        else{
            campo.classList.add("aparece")
        }
    })
    fecha.addEventListener("click", () => {
        campo.classList.remove("aparece")
    })
}

const prodView = () => {
    let grid = document.querySelector(".tb")
    let list = document.querySelector(".lt")
    let cmpList = document.querySelector(".lista")
    let cmpGrid = document.querySelector(".grid")

    grid.addEventListener("click", () => {
        cmpGrid.classList.remove("some")
        cmpList.classList.add("some")
    })
    list.addEventListener("click", () => {
        cmpGrid.classList.add("some")
        cmpList.classList.remove("some")
    })

}

menu()
prodView()