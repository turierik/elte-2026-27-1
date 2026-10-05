const wordList = ["javascript", "programming"];
const visualElements = [
    `<line x1="0" y1="99%" x2="100%" y2="99%" />`,
    `<line x1="20%" y1="99%" x2="20%" y2="5%" />`,
    `<line x1="20%" y1="5%" x2="60%" y2="5%" />`,
    `<line x1="60%" y1="5%" x2="60%" y2="20%" />`,
    `<circle cx="60%" cy="30%" r="10%" />`,
    `<line x1="60%" y1="30%" x2="60%" y2="70%" />`,
    `<line x1="40%" y1="50%" x2="80%" y2="50%" />`,
    `<line x1="60%" y1="70%" x2="50%" y2="90%" />`,
    `<line x1="60%" y1="70%" x2="70%" y2="90%" />`
];

const controlsDiv = document.querySelector("#controls");
const startButton = document.querySelector("#start");
const resultDiv = document.querySelector("#result");
const gameDiv = document.querySelector("#game");
const tr = document.querySelector("tr");
const buttonsDiv = document.querySelector("#buttons");
const svg = document.querySelector("svg");

let targetWord;
let guessedLetters;

function newGame(){
    guessedLetters = [];
    targetWord = wordList[ Math.floor(Math.random() * wordList.length) ];
    gameDiv.style.display = "block";
    controlsDiv.style.display = "none";
    refreshUI();
}
startButton.addEventListener("click", newGame);

function refreshUI(){
    renderWord();
    renderButtons();
    renderGraphics();
}

function renderWord(){
    tr.innerHTML = Array.from(targetWord).map(letter => `<td>${
        guessedLetters.includes(letter) ? letter : "_"
    }</td>`).join('');
}

function renderButtons(){
    const alphabet = [...Array(26).keys()].map(x => String.fromCharCode(65 + x));
    buttonsDiv.innerHTML = alphabet.map(letter => `<button
        ${guessedLetters.includes(letter.toLowerCase()) ? "disabled" : "" }    
    >${letter}</button>`).join('');
}

buttonsDiv.addEventListener("click", function(e){
    if (e.target.matches("button")){
        guessedLetters.push(e.target.innerHTML.toLowerCase());
        refreshUI();
    }
});

function renderGraphics(){
    const mistakes = guessedLetters.filter(letter => !targetWord.includes(letter)).length;
    svg.innerHTML = visualElements.slice(0, mistakes).join('');
}

// HF: legyen vége a játéknak
// - nyertél, ha a targetWord minden betűje eleme guessedLetters
// - vesztettél, ha mistakes >= visualElements.length
// és akkor resultDiv-be kiirni valamit + controlsDiv visszahoz + új játék gomb működjön
