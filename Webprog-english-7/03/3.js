// When I press the button
// Generate a multiplication table NxN
// 
// e.g N = 4
// 1  2  3  4
// 2  4  6  8 
// 3  6  9  12
// 4  8 12  16

// JS trick: [...Array(N).keys()]   --> [0, 1, ..., N-1]

const sizeInput = document.querySelector("input");
const genButton = document.querySelector("button");
const table     = document.querySelector("table");

function handleGenButtonClicked(){
    const n = parseInt(sizeInput.value);
    // manual mode :)
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
    // or tricky
    table.innerHTML = [...Array(n).keys()].map(i => `<tr>${
        [...Array(n).keys()].map(j => `<td>${(i + 1) * (j + 1)}</td>`).join('')}
    </tr>`).join('');
}

genButton.addEventListener("click", handleGenButtonClicked);