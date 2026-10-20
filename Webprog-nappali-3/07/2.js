const canvas = document.querySelector("canvas");
const ctx = canvas.getContext("2d");

let balls = [
    {x: 50, y: 50, r: 20, c: "red", vy: 0}
];

function draw(){
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    for (const ball of balls){
        ctx.beginPath();
        ctx.arc(ball.x, ball.y, ball.r, 0, 2 * Math.PI);
        ctx.fillStyle = ball.c;
        ctx.fill();
    }
}

function update(dt){
    if (dt > 100) return;
    for (const ball of balls){
        ball.vy += 0.001 * dt;
        ball.y += ball.vy * dt;
        if (ball.y + ball.r > canvas.height){
            ball.vy *= -0.7;
            ball.y = canvas.height - ball.r;
        }
    }
}

canvas.addEventListener("click", function(e){
    balls.push({
        x: e.offsetX,
        y: e.offsetY,
        r: Math.floor(5 + Math.random() * 15),
        c: `rgb(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)})`,
        vy: 0
    })
});

let last = performance.now();

function loop(){
    const now = performance.now();
    const dt  = now - last;
    draw();
    update(dt);
    requestAnimationFrame(loop);
    last = now;
}

loop();