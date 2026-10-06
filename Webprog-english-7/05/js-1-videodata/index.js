const taskA = document.querySelector('#taskA')
const taskB = document.querySelector('#taskB')
const taskC = document.querySelector('#taskC')
const taskD = document.querySelector('#taskD')
const taskE = document.querySelector('#taskE')

taskA.innerText = data.find(video => video.year < 2000).title;

taskB.innerText = data.filter(video => video.views > 100).map(video => video.title).join(', ');

taskC.innerText = data.filter(video => video.title.includes('Love')).length;

const videos2024 = data.filter(video => video.year === 2024);
const sumOfViews = videos2024.reduce((sum, video) => sum + video.views, 0);
const avgOfViews = sumOfViews / videos2024.length;
taskD.innerText = avgOfViews.toFixed(2);

const titlesOnly = data.map(video => video.title.split(' - ')[1]).join(', ').split('');
taskE.innerText = titlesOnly.some(char => char >= '0' && char <= '9');
