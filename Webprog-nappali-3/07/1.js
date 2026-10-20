const canvas = document.querySelector("canvas");
const ctx = canvas.getContext("2d");

ctx.fillStyle = "blue";
ctx.fillRect(20, 50, 80, 40);

ctx.strokeStyle = "hotpink";
ctx.lineWidth = 2;
ctx.strokeRect(40, 70, 80, 40);

ctx.font = "60px Arial";
ctx.fillText("Hello", 200, 100);
ctx.strokeText("Hello", 200, 200);

// 160-300 60-350 200-350

ctx.beginPath();
ctx.moveTo(160, 300);
ctx.lineTo(60, 350);
ctx.lineTo(200, 350);
ctx.lineTo(160, 300);
ctx.strokeStyle = "red";
ctx.stroke();

const image = new Image();
image.src = "dekan.jpg";
image.addEventListener("load", () => ctx.drawImage(image, 50, 200, 120, 80));
