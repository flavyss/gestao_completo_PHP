const cadcamp = () => {
    let camp = document.querySelector(".cadastra")
    let display = document.querySelector(".cadCamp")

    camp.addEventListener("click", () => {
        display.classList.add("none")
    })
}

cadcamp();