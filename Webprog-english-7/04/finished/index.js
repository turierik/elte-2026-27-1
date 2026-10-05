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

function refreshUI(){
    drawTable();
    drawButtons();
    drawLittleMan();
}

function newGame(){
    guessedLetters = [];
    targetWord = wordList[Math.floor(Math.random() * wordList.length)];
    controlsDiv.style.display = "none";
    gameDiv.style.display = "block";
    refreshUI();
}

startButton.addEventListener("click", newGame);

function drawTable(){
    tr.innerHTML = targetWord.split('').map(letter => `<td>${
        guessedLetters.includes(letter) ? letter : "_"
    }</td>`).join('');
}

function drawButtons(){
    const alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ".split('');
    buttonsDiv.innerHTML =   
        alphabet.map(letter => `<button
            ${guessedLetters.includes(letter.toLowerCase()) ? "disabled" : ""}
        >${letter}</button>`).join('');
}

function handleLetterClick(e){
    if (e.target.matches('button')){
        const letter = e.target.innerText.toLowerCase();
        guessedLetters.push(letter);
        refreshUI();
    }
}

buttonsDiv.addEventListener("click", handleLetterClick);

function drawLittleMan(){
    const m = mistakes();
    svg.innerHTML = visualElements.slice(0, m).join('');
}

function mistakes(){
    return guessedLetters.filter(letter => !targetWord.includes(letter)).length;
}

// Homework:
// Check the endgame conditions and show a message in #result:
// - win: if all letters are guessed
// - lose: if all visual elements are shown
// if game ends, show the controls div and start a new game if button is pressed
