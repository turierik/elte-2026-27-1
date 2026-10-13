const videoTable = document.querySelector('#video-table')
const videoTableBody = document.querySelector('#video-table tbody')
const viewInput = document.querySelector('#amount')
const btnAdd = document.querySelector('#btn-add')
const btnSub = document.querySelector('#btn-sub')
const sumSpan = document.querySelector('#sum')

data.forEach(video => video.selected = false);

function generateTable(){
    videoTableBody.innerHTML = data.map(video => `<tr class="${video.selected ? "selected" : ""}">
            <td>${video.year}</td>
            <td>${video.title}</td>
            <td>${video.views} million</td>
        </tr>`).join('');
}

function updateSum(){
    const selectedVideos = data.filter(video => video.selected);
    sumSpan.innerText = (selectedVideos.length ? selectedVideos : data).reduce((acc, video) => acc + video.views, 0);
}

generateTable();
updateSum();

function toggleSelection(e){
    if (e.target.matches("td")){
        const tr = e.target.parentElement;
        const index = tr.sectionRowIndex;
        data[index].selected = !data[index].selected;
        generateTable();
        updateSum();
    }
}

videoTableBody.addEventListener("click", toggleSelection);

function addViews(k){
    const amount = k * Number(viewInput.value);
    data.filter(video => video.selected).forEach(video => video.views = Math.max(video.views + amount, 0));
    generateTable();
    updateSum();
}

btnAdd.addEventListener("click", () => addViews(1));
btnSub.addEventListener("click", () => addViews(-1));

function sortTable(e){
    if (e.target.matches("th")){
        const sortBy = e.target.dataset.sort;
        data.sort((a, b) => a[sortBy] > b[sortBy] ? -1 : 1);
        generateTable();
    }
}

videoTable.addEventListener("click", sortTable);