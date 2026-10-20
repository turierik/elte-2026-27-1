const canvas = document.querySelector("canvas");
const ctx = canvas.getContext("2d");

let circles = [
    {x: 50, y: 50, v: 0, r: 20, c: "red"}
];

function draw(){
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    for (const circle of circles){
        ctx.beginPath();
        ctx.fillStyle = circle.c;
        ctx.arc(circle.x, circle.y, circle.r, 0, 2 * Math.PI);
        ctx.fill();
    }
}

function update(dt){
    for (const circle of circles){
        circle.v += 0.0001 * dt;
        circle.y += circle.v * dt;
        if (circle.y + circle.r > canvas.height){
            circle.v *= -0.7;
            circle.y = canvas.height - circle.r;
        }
    }
}

let last = performance.now();

function loop(){
    const now = performance.now();
    const dt = now - last;
    draw();
    update(dt);
    // setTimeout(loop, 1/60000);
    requestAnimationFrame(loop);
    last = now;
}

loop();

canvas.addEventListener("click", function(e){
    circles.push({
        x: e.offsetX,
        y: e.offsetY,
        v: 0,
        r: Math.floor(5 + Math.random() * 15),
        c: `rgb(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)})`,
    })
});