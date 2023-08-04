const ctx = document.getElementById("chart");

let myChart = new Chart(ctx, {
    type: "line",
    data: {
        labels: [],
        datasets: [
            {
                label: "Quick Count of Votes",
                data: [],
                borderWidth: 1,
            },
        ],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
});

function updateChart() {
    fetch("/realtime-chart/datas", {
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        method: "GET",
    })
        .then((res) => res.json())
        .then((data) => {
            console.log(data);
            myChart.data.labels = data.labels;
            myChart.data.datasets[0].data = data.datas;
            myChart.update();
        });
}

updateChart();

setInterval(() => {
    updateChart();
}, 3000);
