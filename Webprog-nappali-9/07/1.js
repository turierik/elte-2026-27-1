const canvas = document.querySelector("canvas");
const ctx = canvas.getContext("2d");

ctx.fillStyle = "green";
ctx.fillRect(20, 80, 100, 50);

ctx.strokeStyle = "orange";
ctx.lineWidth = 4;
ctx.strokeRect(40, 100, 100, 50);

ctx.font = "70px Arial";
ctx.fillText("Hello", 200, 200);
ctx.strokeText("Hello", 200, 260);

const image = new Image();
image.src = "meme.webp";
image.addEventListener("load",
    () => ctx.drawImage(image, 100, 200, 50, 50)
);

// 140-40, 380-130, 250-130

ctx.beginPath();
ctx.moveTo(140, 40);
ctx.lineTo(380, 130);
ctx.lineTo(250, 130);
ctx.lineTo(140, 40);
ctx.fillStyle = "lightblue";
ctx.fill();
ctx.stroke();