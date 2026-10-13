const videoTable = document.querySelector('#video-table')
const videoTableBody = document.querySelector('#video-table tbody')
const viewInput = document.querySelector('#amount')
const btnAdd = document.querySelector('#btn-add')
const btnSub = document.querySelector('#btn-sub')
const sumSpan = document.querySelector('#sum')

for (const video of data)
    video.selected = false;

function generateTableBody(){
    videoTableBody.innerHTML = data.map(video => `<tr class="${video.selected ? "selected" : ""}">
            <td>${video.year}</td>
            <td>${video.title}</td>
            <td>${video.views} million</td>
        </tr>`).join('');
}

function updateSum(){
    const selectedVideos = data.filter(video => video.selected);
    if (selectedVideos.length === 0)
        sumSpan.innerText = data.reduce((sum, video) => sum + video.views, 0);
    else
        sumSpan.innerText = selectedVideos.reduce((sum, video) => sum + video.views, 0);
}

generateTableBody();
updateSum();

function toggleSelected(e){
    if (e.target.matches("td")){
        const tr = e.target.parentElement;
        const index = tr.sectionRowIndex;
        data[index].selected = !data[index].selected;
        generateTableBody();
        updateSum();
    }
}

videoTableBody.addEventListener("click", toggleSelected);

function handleBtnAddClick(){
    const num = Number(viewInput.value);
    data.filter(video => video.selected).forEach(video => video.views += num);
    generateTableBody();
    updateSum();
}

btnAdd.addEventListener("click", handleBtnAddClick);

function handleBtnSubClick(){
    const num = Number(viewInput.value);
    data.filter(video => video.selected).forEach(video => video.views = Math.max(video.views - num, 0) );
    generateTableBody();
    updateSum();
}

btnSub.addEventListener("click", handleBtnSubClick);

const videoTableHead = document.querySelector("#video-table thead");

function sortTable(e){
    if (e.target.matches("th")){
        const sortBy = e.target.dataset.sort;
        data.sort((a, b) => a[sortBy] < b[sortBy] ? 1 : -1);
        generateTableBody();
        updateSum();
    }
}

videoTableHead.addEventListener("click", sortTable);