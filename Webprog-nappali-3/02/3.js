const inputA = document.querySelector("#a");
const inputB = document.querySelector("#b");
const opSelect = document.querySelector("select");
const calcButton = document.querySelector("button");
const resultSpan = document.querySelector("span");

function calculate(){
    const a = Number(inputA.value);
    const b = Number(inputB.value);
    const op = opSelect.value;
    let result;
    if (op === "add")      result = a + b;
    else if (op === "sub") result = a - b;
    else if (op === "mul") result = a * b;
    else if (op === "div") result = a / b;
    resultSpan.innerText = result;
}

calcButton.addEventListener("click", calculate);