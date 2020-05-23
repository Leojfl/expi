$(document).ready(()=>{
    var label=['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange']
    createGraphic('graphic-users',label, 'Titulo',
        [getData('Uno', [1,2,3,4,5,6])]);
});

/**
 *
 * @param content
 * @param labels
 * @param title
 * @param data
 */
function createGraphic(content,labels, title, datasets) {
    var ctx = document.getElementById(content);
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: datasets
        }
    });
}

function getData(title,numbers) {
    return  dataFirst = {
        label: title,
        data: numbers,
        lineTension: 0,
        fill: false,
        borderColor: '#000000',
        backgroundColor: 'transparent',
        pointBorderColor: '#000000',
        pointBackgroundColor: '#ffffff',
        pointRadius: 4,
        pointHoverRadius: 5,
        pointHitRadius: 5,
        pointBorderWidth: 4,
    };
}
