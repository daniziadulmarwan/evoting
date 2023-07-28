const colors = ["#1abc9c", "#4fc6e1"];

function PolingChart() {
    fetch("/admin/dashboard/chart")
        .then((res) => res.json())
        .then((data) => {
            let names = [];
            let datas = [];

            for (const key in data) {
                if (Object.hasOwnProperty.call(data, key)) {
                    const result = data[key];
                    names.push(result.fullname);
                }
            }

            for (const key in data) {
                if (Object.hasOwnProperty.call(data, key)) {
                    const result = data[key];
                    datas.push(result.point);
                }
            }

            const options = {
                series: [
                    {
                        name: "Hasil Poling",
                        data: datas,
                    },
                ],
                chart: {
                    height: 350,
                    type: "bar",
                },
                colors: colors,
                plotOptions: {
                    bar: {
                        columnWidth: "45%",
                        distributed: true,
                    },
                },
                dataLabels: {
                    enabled: true,
                },
                legend: {
                    show: false,
                },
                xaxis: {
                    categories: names,
                    labels: {
                        style: {
                            colors: colors,
                            fontSize: "12px",
                        },
                    },
                },
            };

            const chart = new ApexCharts(
                document.querySelector("#poling-chart"),
                options
            );
            chart.render();
        });
}

PolingChart();
