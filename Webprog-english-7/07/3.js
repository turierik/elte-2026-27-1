
const canvas = document.querySelector("canvas");
const ctx = canvas.getContext("2d");

/*
TASK: bouncy balls
1.) draw a ball
let ball = {x: 50, y: 50, r: 20, c: "red"};
2.) make the ball fall with constant speed
3.) add gravity, make the ball accelerate
 - add a new property: ball.v - increate that everytime
4.) make the ball bounce back from the bottom edge
5.) when I click on the Canvas, add a new ball with
 random color and size
*/

let balls = [
    {x: 50, y: 50, r: 20, v: 0, c: "red"}
];

function draw(){
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    for (const ball of balls){
        ctx.fillStyle = ball.c;
        ctx.beginPath();
        ctx.arc(ball.x, ball.y, ball.r, 0, 2 * Math.PI);
        ctx.fill();
    }
}

const GRAVITY = 0.0001;

function update(dt){
    if (dt > 100) return;
    for (const ball of balls){
        ball.v += GRAVITY * dt;
        ball.y += ball.v * dt;
        if (ball.y + ball.r > canvas.height){
            ball.v *= -0.7;
            ball.y = canvas.height - ball.r;
        }
    }
}

let last = performance.now();

function loop(){
    const now = performance.now();
    const dt = now - last;
    draw();
    update(dt);
    last = now;
    requestAnimationFrame(loop);
}
loop();

canvas.addEventListener("click", function(e){
    balls.push({
        x: e.offsetX,
        y: e.offsetY,
        r: Math.floor(10 + Math.random() * 10),
        v: 0,
        c: `rgb(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)})`
    });
})