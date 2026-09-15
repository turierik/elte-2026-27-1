const inputA = document.querySelector("#a");
const inputB = document.querySelector("#b");
const inputOp = document.querySelector("select");
const calcButton = document.querySelector("button");
const resultSpan = document.querySelector("span");

function calculate() {
    const a = Number(inputA.value);
    const b = Number(inputB.value);
    const op = inputOp.value;
    if (op === "add")
        resultSpan.innerHTML = a + b;
    else if (op === "sub")
        resultSpan.innerHTML = a - b;
    else if (op === "mul")
        resultSpan.innerHTML = a * b;
    else if (op === "div")
        resultSpan.innerHTML = a / b;
}

calcButton.addEventListener("click", calculate);