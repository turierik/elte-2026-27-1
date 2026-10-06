const taskA = document.querySelector('#taskA')
const taskB = document.querySelector('#taskB')
const taskC = document.querySelector('#taskC')
const taskD = document.querySelector('#taskD')
const taskE = document.querySelector('#taskE')

taskA.innerHTML = data.find(video => video.year < 2000).title;

taskB.innerHTML = data.filter(video => video.views > 100).map(video => video.title).join(', ');

taskC.innerHTML = data.filter(video => video.title.includes("Love")).length;

const videosOf2024 = data.filter(video => video.year === 2024);
const viewsOf2024 = videosOf2024.map(video => video.views);
const sum = viewsOf2024.reduce((s, v) => s + v, 0);
const avg = sum / videosOf2024.length;

taskD.innerHTML = avg.toFixed(2);

const titles = data.map(video => video.title.split(' - ')[1]);
const joined = titles.join(', ');
const chars = joined.split('');
taskE.innerHTML = chars.some(c => c >= "0" && c <= "9") ? "Yes" : "No";