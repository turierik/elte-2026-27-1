const videoTable = document.querySelector('#video-table')
const videoTableBody = document.querySelector('#video-table tbody')
const viewInput = document.querySelector('#amount')
const btnAdd = document.querySelector('#btn-add')
const btnSub = document.querySelector('#btn-sub')
const sumSpan = document.querySelector('#sum')

data.forEach(video => video.selected = false);

function generateTableBody(){
    videoTableBody.innerHTML = data.map(video => `<tr data-id="${video.id}"
        class="${video.selected ? "selected": "" }">
            <td>${video.year}</td>
            <td>${video.title}</td>
            <td>${video.views} million</td>
        </tr>`).join('');
}

function updateSum(){
    const selectedVideos = data.filter(video => video.selected);
    sumSpan.innerText = (selectedVideos.length ? selectedVideos : data).reduce((sum, video) => sum + video.views, 0);
}

generateTableBody();
updateSum();

function toggleSelected(e){
    if (e.target.matches("td")){
        const tr = e.target.parentElement;
        const id = tr.dataset.id;
        const video = data.find(video => video.id === id);
        video.selected = !video.selected;
        generateTableBody();
        updateSum();
    }
}

videoTableBody.addEventListener("click", toggleSelected);

function handleBtnClick(multiplyBy){
    const amount = multiplyBy * Number(viewInput.value);
    data.filter(video => video.selected).forEach(video => video.views = Math.max(video.views + amount, 0));
    generateTableBody();
    updateSum();
}

btnAdd.addEventListener("click", () => handleBtnClick(1));
btnSub.addEventListener("click", () => handleBtnClick(-1));

function sortTable(e){
    if (e.target.matches("th")){
        const sortBy = e.target.dataset.sort;
        data.sort( (a, b) => a[sortBy] < b[sortBy] ? 1 : -1 );
        generateTableBody();
    }
}

videoTable.addEventListener("click", sortTable);