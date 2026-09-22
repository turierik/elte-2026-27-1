const sizeInput = document.querySelector("input");
const genButton = document.querySelector("button");
const table     = document.querySelector("table");

function handleGenButtonClicked(){
    const n = parseInt(sizeInput.value);
    // kézi mátrix létrehozás
    let matrix = [];
    for (let i = 0; i < n; i++){
        matrix[i] = [];
        for (let j = 0; j < n; j++){
            matrix[i][j] = (i + 1) * (j + 1);
        }
    }
    table.innerHTML = 
        matrix.map(row => `<tr>${
            row.map(cell => `<td>${cell}</td>`).join('')
        }</tr>`).join('');
    // vagy trükkösen is megoldható :)
    table.innerHTML = [...Array(n).keys()].map(i => `<tr>${
        [...Array(n).keys()].map(j => `<td>${(i + 1) * (j + 1)}</td>`).join('')}
    </tr>`).join('');
}

genButton.addEventListener("click", handleGenButtonClicked);
