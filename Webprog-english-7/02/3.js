const a = document.querySelector("#a");
const b = document.querySelector("#b");
const op = document.querySelector("select");
const button = document.querySelector("button");
const span = document.querySelector("span");

function calculate() {
    const av = parseFloat(a.value);
    const bv = parseFloat(b.value);
    const oper = op.value;
    let result;
    if (oper === "add") result = av + bv;
    if (oper === "sub") result = av - bv;
    if (oper === "mul") result = av * bv;
    if (oper === "div") result = av / bv;
    span.innerHTML = result;
}

button.addEventListener("click", calculate);