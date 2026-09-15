const inputR = document.querySelector("#r");
const inputG = document.querySelector("#g");
const inputB = document.querySelector("#b");

function update(){
    const r = inputR.value;
    const g = inputG.value;
    const b = inputB.value;
    document.body.style.backgroundColor = `rgb(${r}, ${g}, ${b})`;
}

inputR.addEventListener("input", update);
inputG.addEventListener("input", update);
inputB.addEventListener("input", update);
