const colors = ["#1abc9c", "#4fc6e1"];
const ctx = document.getElementById("poling-chart");

let myChart = new Chart(ctx, {
    type: "bar",
    data: {
        labels: [],
        datasets: [
            {
                labels: "",
                data: [],
                borderWidth: 1,
                backgroundColor: colors,
            },
        ],
    },
    options: {
        legend: {
            display: false,
        },
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
});

function updateChart() {
    fetch("/admin/dashboard/chart")
        .then((res) => res.json())
        .then((data) => {
            myChart.data.labels = data.labels;
            myChart.data.datasets[0].data = data.points;
            myChart.update();
        });
}

updateChart();

setInterval(() => {
    updateChart();
}, 3000);
