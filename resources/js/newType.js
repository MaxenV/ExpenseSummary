document.addEventListener('DOMContentLoaded', function () {
    let chBox = document.querySelector("#newTypeCheck")
    let typeSelect = document.querySelector("select")
    let typeContainer = document.querySelector(".newTypeContainer")

    if (chBox.checked) {
        typeContainer.style.transform = `scaleY(1)`;
        typeSelect.disabled = true
    } else {
        typeContainer.style.transform = `scaleY(0)`;
        typeSelect.disabled = false
    }

    chBox.addEventListener('click', () => {
        if (chBox.checked) {
            typeContainer.style.transform = `scaleY(1)`;
            typeSelect.disabled = true
        } else {
            typeContainer.style.transform = `scaleY(0)`;
            typeSelect.disabled = false
        }
    })
})