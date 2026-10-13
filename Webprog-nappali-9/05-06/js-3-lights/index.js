const containerDiv = document.querySelector('#bethlehem');
const form = document.querySelector('form');
const colorButton = document.querySelector('#animate-colors');

const lights = []; // x, y, c

const nextColor = {
    "#ff0000": "#00ff00",
    "#00ff00": "#0000ff",
    "#0000ff": "#ffff00",
    "#ffff00": "#ff0000"
}

function newLight(e){
    const color = form.elements['color'].value
    lights.push({
        x: e.offsetX,
        y: e.offsetY,
        c: color
    });
    form.elements['color'].value = nextColor[color];
    renderLights();
}

function renderLights(){
    containerDiv.innerHTML = lights.map(light => `<li
        style="left: ${light.x}px; top: ${light.y}px; background-color: ${light.c};">
    </li>`).join("");
}

containerDiv.addEventListener("click", newLight);

function animateColor(){
    const colors = lights.map(light => light.c);
    const first = colors.shift();
    colors.push(first);
    lights.forEach((light, i) => light.c = colors[i]);
    renderLights();
}

colorButton.addEventListener("click", () => setInterval(animateColor, 1000));