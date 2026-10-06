const taskA = document.querySelector('#taskA')
const taskB = document.querySelector('#taskB')
const taskC = document.querySelector('#taskC')
const taskD = document.querySelector('#taskD')
const taskE = document.querySelector('#taskE')

taskA.innerText = data.find(video => video.year < 2000).title;

taskB.innerText = data.filter(video => video.views > 100).map(video => video.title).join(", ");

taskC.innerText = data.filter(video => video.title.includes("Love")).length;

const videosOf2024 = data.filter(video => video.year === 2024);
const sum = videosOf2024.reduce( (acc, video) => acc + video.views, 0);
const avg = sum / videosOf2024.length;
taskD.innerText = avg.toFixed(2);

const titles = data.map(video => video.title.split(" - ")[1]);
const joined = titles.join(", ");
const chars = joined.split("");
taskE.innerText = chars.some(c => c >= "0" && c <= "9");
