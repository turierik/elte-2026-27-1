const canvas = document.querySelector("canvas");
const ctx = canvas.getContext("2d");

const image = new Image();
image.src = "fox.png";

let x = 50;

function drawing(){
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.drawImage(image, x, 200, 80, 80);
}

function update(dt){
    if (x < 300) x += dt * 0.001;
}

let last = performance.now();

function loop(){
    const now = performance.now();
    const dt = now - last;
    drawing();
    update(dt);
    requestAnimationFrame(loop);
    last = now;
}

image.addEventListener("load", loop);