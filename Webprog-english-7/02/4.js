const r = document.querySelector("#r");
const g = document.querySelector("#g");
const b = document.querySelector("#b");
// const body = document.querySelector("body");
// document.body

function update(){
    const rv = r.value;
    const gv = g.value;
    const bv = b.value;
    document.body.style.backgroundColor = `rgb(${rv}, ${gv}, ${bv})`;    
}

r.addEventListener("input", update);
g.addEventListener("input", update);
b.addEventListener("input", update);
